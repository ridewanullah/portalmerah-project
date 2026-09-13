<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Proxy extends BaseConfig
{
    /**
     * --------------------------------------------------------------------------
     * Trusted Proxies
     * --------------------------------------------------------------------------
     *
     * Set this property to an array of IP addresses belonging to your trusted 
     * reverse proxies if your application sits behind one.
     *
     * @var array<int, string>|string
     */
    public $ips = [];

    /**
     * --------------------------------------------------------------------------
     * Proxy Headers
     * --------------------------------------------------------------------------
     *
     * The HTTP headers that your proxy server uses to send info.
     *
     * @var array<string, string>
     */
    public array $headers = [];
}
