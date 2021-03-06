<?php
namespace FloospayNet\FloospayAPIs;

class Floospay_Util
{

    static function return_resp($contents) {
        $arrayObject = self::objectToArray($contents);
        self::checkError($arrayObject);
        return $arrayObject;
    }

    public static function objectToArray($object)
    {
        
        $object = json_decode($object, true);
        $array=array();
        if ($object && (is_array($object) || is_object($object))) {
            foreach(@$object as $member=>$data)
            {
                $array[$member]=$data;
            }
           
        }
        return $array;
    }

    public static function checkError($contents)
    {
        if (isset($contents['exception'])) {
            throw new Floospay_Error($contents['exception']['errorMsg'], intval($contents['exception']['errorCode']));
        }
    }

}
