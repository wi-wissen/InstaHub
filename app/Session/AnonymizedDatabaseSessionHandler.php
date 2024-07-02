<?php

namespace App\Session;

use Illuminate\Session\DatabaseSessionHandler;

class AnonymizedDatabaseSessionHandler extends DatabaseSessionHandler
{
    /**
     * Get the IP address for the current request.
     *
     * @return string|null
     */
    protected function ipAddress()
    {
        $ip = $this->container->make('request')->ip();

        return $this->anonymizeIpAddress($ip);
    }

    protected function anonymizeIpAddress($ip)
    {
        if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            // IPv4: Zeros of the last block
            return preg_replace('/\d+$/', '0', $ip);
        } elseif (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            // IPv6: Zeros of the last 64 bits
            return substr($ip, 0, strrpos($ip, ':')) . ':0000';
        }
        
        return $ip;
    }
}