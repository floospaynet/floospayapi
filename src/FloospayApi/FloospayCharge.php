<?php
namespace FloospayNet\FloospayAPIs;

class Floospay_Charge extends FloospayApi
{

    public static function auth($params=array())
    {
        $request = new Floospay_Requester();
        $result = $request->do_call($params);
        return Floospay_Util::return_resp($result);
    }

}