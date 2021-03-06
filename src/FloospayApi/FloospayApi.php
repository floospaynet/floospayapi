<?php
namespace FloospayNet\FloospayAPIs;

abstract class FloospayApi
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
            self::$apiUrl  = 'https://apis.floospay.net/api/charge/create';
        } else {
            self::$apiUrl  = 'https://apis.floospay.net/api/charge/create';
        }
    }
}

// require(dirname(__FILE__) . '/FloospayRequester.php');
// require(dirname(__FILE__) . '/FloospayCharge.php');
// require(dirname(__FILE__) . '/FloospayUtil.php');
// require(dirname(__FILE__) . '/FloospayError.php');
