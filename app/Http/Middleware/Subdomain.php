<?php

namespace App\Http\Middleware;

use Symfony\Component\HttpFoundation\Response;
use App\Facades\RequestHub;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;

class Subdomain
{
    /**
     * Handle an incoming request.
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Livewire can't use `$request->route()->parameter('subdomain')` because it is not in Group
        $subdomain = $this->checkSubdomain($request);

        if ($subdomain) {

            // change app domain (for mails for example)
            Config::set('app.url', RequestHub::url());

            // help controllers to ignore subdomain
            if (RequestHub::isHub()) {
                RequestHub::setHubDB();
                $request->route()->forgetParameter('subdomain');
            }
        }

        return $next($request);
    }

    public function checkSubdomain(Request $request)
    {
        $host = $request->getHost();
        $adminDomain = config('app.domain_admin');
        $hubDomainPattern = config('app.domain_hub');

        // Überprüfen, ob es sich nicht um die Admin-Domain handelt
        if ($host === $adminDomain) {
            return null;
        }

        // Extrahieren der Subdomain aus dem Host
        $subdomain = Str::before($host, Str::after($hubDomainPattern, '{subdomain}'));

        // Überprüfen, ob die Subdomain dem Muster entspricht
        if (Str::contains($hubDomainPattern, '{subdomain}') &&
            Str::endsWith($host, Str::after($hubDomainPattern, '{subdomain}'))) {
            return $subdomain;
        }

        return null;
    }
}
