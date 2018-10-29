<?php
namespace FloospayNet\FloospayAPIs;

use Illuminate\Support\ServiceProvider;

class FloospayApiServiceProvider extends ServiceProvider
{
    public static $sid;
    public static $privateKey;
    public static $apiUrl;
    public static $error;
    const VERSION = '0.0.1';

    static function setCredentials($sid, $privateKey, $mode='')
    {
        self::$sid = $sid;
        self::$privateKey = $privateKey;
        if ($mode == 'sandbox') {
            self::$apiUrl = 'https://sandbox.floospay.com/checkout/api/v1/charge';
        } else {
            self::$apiUrl = 'https://checkout.floospay.com/api/v1/charge';
        }
    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/views', 'three_d_secure');
        // $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        $this->mergeConfigFrom(__DIR__ . '/config/paymentapi.php',  'contact');
        $this->publishes([
            __DIR__ . '/config/paymentapi.php' => config_path('paymentapi.php'),
            __DIR__ . '/views' => resource_path('views/vendor/three_d_secure')
        ]);
    }

    public function register()
    {
    }    
}

// require(dirname(__FILE__) . '/FloospayRequester.php');
// require(dirname(__FILE__) . '/FloospayCharge.php');
// require(dirname(__FILE__) . '/FloospayUtil.php');
// require(dirname(__FILE__) . '/FloospayError.php');