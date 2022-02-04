<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
<<<<<<< HEAD
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;
=======
>>>>>>> 8b3c2762c59404147fb47168334e4fd79857db71

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array
     */
    public $aliases = [
<<<<<<< HEAD
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
=======
        'csrf'     => CSRF::class,
        'toolbar'  => DebugToolbar::class,
        'honeypot' => Honeypot::class,
>>>>>>> 8b3c2762c59404147fb47168334e4fd79857db71
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array
     */
    public $globals = [
        'before' => [
            // 'honeypot',
            // 'csrf',
<<<<<<< HEAD
            // 'invalidchars',
=======
>>>>>>> 8b3c2762c59404147fb47168334e4fd79857db71
        ],
        'after' => [
            'toolbar',
            // 'honeypot',
<<<<<<< HEAD
            // 'secureheaders',
=======
>>>>>>> 8b3c2762c59404147fb47168334e4fd79857db71
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['csrf', 'throttle']
     *
     * @var array
     */
    public $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     *
     * @var array
     */
    public $filters = [];
}
