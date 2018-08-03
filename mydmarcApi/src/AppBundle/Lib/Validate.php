<?php

namespace AppBundle\Lib;

/*
    Class used to handle common functions in the project
    Created By  : Binsha MB(binsha@vinamsolutions.com)
    Created On  : 26/07/18
*/
use AppBundle\Constants\ConstantsValue;
use AppBundle\Lib\Helpers;
use Symfony\Component\HttpFoundation\Response;
class Validate {

     /**
        Function used to check request valid or not
        check the request method valid or not
        check the requested content type valid or not
    */
    public function checkRequestValid($headers =array())
    {  
        try {
            if(!empty($headers)) {
                if($headers['content-length'][0] > ConstantsValue::MAX_REQUEST_LENGTH) {
                     return  Helpers::returnData(Response::HTTP_REQUEST_ENTITY_TOO_LARGE, null, ConstantsValue::PAYLOAD_ERROR, null);
                }
            }
            
            $requestMethod         =   $this->validateRequestMethod();
            if( $requestMethod['statusCode']==Response::HTTP_OK ) {  
                return  Helpers::returnData(Response::HTTP_OK, null,null, null);
            } else {
                return $requestMethod;
            }
        } catch (Exception $e) {
            
        }
    }


    /**
        * Function to validate request method

    */
    public function validateRequestMethod()
    {
        $error          =   0;
        $allowedMethod  =   ConstantsValue::ALLOWED_REQUEST_METHOD;
        if($_SERVER['REQUEST_METHOD'] !="") {
            if(!in_array($_SERVER['REQUEST_METHOD'], $allowedMethod)) {
                $error          =   1;
            }
            
        } 
        if($error == 0){
            return Helpers::returnData(Response::HTTP_OK, null, null, null);
        } else {

            return  Helpers::returnData(Response::HTTP_METHOD_NOT_ALLOWED, null, ConstantsValue::CONTENT_TYPE_ERROR, null);
        }
    }

}
?>