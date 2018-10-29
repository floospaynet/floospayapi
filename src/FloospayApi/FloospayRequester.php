<?php
namespace FloospayNet\FloospayAPIs;

class Floospay_Requester
{
    public $apiUrl;
    private $privateKey;

    function __construct() {
        $this->privateKey = FloospayApi::$privateKey;
        $this->apiUrl = FloospayApi::$apiUrl;
    }

    function do_call($data)
    {
        $data['privateKey'] = $this->privateKey;
        $data = json_encode($data);
        $header = array("content-type:application/JSON","content-length:".strlen($data));
        $url = $this->apiUrl;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_TIMEOUT, 120);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $resp = curl_exec($ch);
        curl_close($ch);
        if ($resp === FALSE) {
            throw new Floospay_Error("cURL call failed", "403");
        } else {
            return $resp;
        }
    }

}