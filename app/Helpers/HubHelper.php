<?php

namespace App\Helpers;

use App\Hub;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Boolean;

class HubHelper
{
    private $hub = null;
    private $tables = [];

    public function __construct()
    {
        $host = $_SERVER['HTTP_HOST'];
        $domainParts = explode('.', $host);

        //run only on hub subdomains
        if (str_replace('{subdomain}', $domainParts[0], config('app.domain_hub')) == $host && config('app.domain_admin') != $host) { 
            
            $this->hub = Hub::where('name', '=', $domainParts[0])->first();

            if (!$this->hub) {
                // hub does not exist
                flash(__('Hub does not exist!'))->warning();
                return redirect(env('APP_URL'));
            } else {

                Config::set("database.connections." . env('DB_DATABASE') . "_" . $this->hub->id, array(
                    'driver'    => 'mysql',
                    'host'      => env('DB_HOST'),
                    'database'  => env('DB_DATABASE') . "_" . $this->hub->id,
                    'username'  => env('DB_DATABASE') . "_" . $this->hub->id,
                    'password'  => $this->hub->password,
                    'charset'   => 'utf8mb4',
					'collation' => 'utf8mb4_unicode_ci',
                    'prefix'    => '',
                ));

                $this->setHubDB();

                \Debugbar::info('db: ' . Config::get('database.default'));

                $this->tables = array_map('reset', \DB::select('SHOW TABLES'));

                \Debugbar::info('tables: ' . implode(', ', $this->tables));
            }
        }
    }

    public function setHubDB($id = null) {
        if(! $id) $id = $this->hub->id;

        if(! config()->has("database.connections." . env('DB_DATABASE') . "_" . $id)) {
            $this->setDefaultDB();
            $hub = Hub::findOrFail($id);

            Config::set("database.connections." . env('DB_DATABASE') . "_" . $hub->id, array(
                'driver'    => 'mysql',
                'host'      => env('DB_HOST'),
                'database'  => env('DB_DATABASE') . "_" . $hub->id,
                'username'  => env('DB_DATABASE') . "_" . $hub->id,
                'password'  => $hub->password,
                'charset'   => 'utf8mb4',
                'collation' => 'utf8mb4_unicode_ci',
                'prefix'    => '',
            ));
        }

        Config::set('database.default', env('DB_DATABASE') . "_" . $id);
        $this->tables = array_map('reset', \DB::select('SHOW TABLES'));
    }

    public function setDefaultDB() {
        Config::set('database.default', env('DB_CONNECTION'));
    }

    public function isHub() {
        return (Boolean) $this->hub;
    }

    public function isReadOnly() {
        return (Boolean) $this->hub->readonly();
    }

    public function id() {
        return $this->hub->id;
    }

    public function name() {
        return $this->hub->name;
    }

    public function url($name = null) {
        $protocol = $_SERVER['PROTOCOL'] = isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) ? 'https' : 'http';

        if(! $name) {
            return $protocol . '://' . $_SERVER['HTTP_HOST'];
        }
        else {
            return $protocol . '://' . str_replace('{subdomain}', $name, config('app.domain_hub'));
        }
        
    }

    public function hasTable($name) {
        return in_array($name, $this->tables);
    }
}