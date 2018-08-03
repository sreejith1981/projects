<?php

namespace AppBundle\Lib;

/*
    Class used to handle common functions in the project
    Created By  : Binsha MB(binsha@vinamsolutions.com)
    Created On  : 26/07/18
*/
use AppBundle\Constants\ConstantsValue;
use Symfony\Component\HttpFoundation\Response;

use Spatie\ArrayToXml\ArrayToXml;

use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

use Bepsvpt\SecureHeaders\SecureHeaders;
class Helpers {
   
   
    /**
     * Function convert xml values
     * @param $data - data to convert xml
     * @param &$xml_data - xml object
     */
    public function conv( $data, &$xml_data ) 
    {
        foreach( $data as $key => $value ) {
            if( is_numeric($key) ){
                $key = 'item'.$key; 
            }
            if( is_array($value) ) {
                $subnode = $xml_data->addChild($key);
                $commoObj = new CommonFunctions();
                $commoObj ->conv($value, $subnode);
            } else {
                $xml_data->addChild("$key",htmlspecialchars("$value"));
            }
        }
}
    /**
        * Function used to return date
        * @param $responseCode   - responseCode 
        * @param  $message    -   message to return
        * @param $data    -       data  to return 
        * @param $errors     - error data and message
        * @param $returnType     - return type of response s

    */

    public static function returnData( $responseCode ,  $errors ,  $data , $message ,$returnType="array" ) 
    {     

        $successResponseCodeArr = array(Response::HTTP_OK,Response::HTTP_CREATED);
        $cwd                    =    getcwd();
        $secureHeaders = SecureHeaders::fromFile($cwd.'/../app/config/secure-headers.php');
        $secureHeaders->headers();
        if($returnType =="json") {
            $arr =  array('statusCode' => $responseCode, 'responsePhrase' => Response::$statusTexts[$responseCode], 'responseDetails' => $message, 'errors' => $errors, 'data' => $data);
            $response = new Response(json_encode($arr),$arr['statusCode']);
            $response->headers->set('Content-Type', 'application/json');
            $secureHeaders->send();
            return $response;


        } else if($returnType=='xml') { 
            $result     =   array('statusCode' => $responseCode, 'responsePhrase' => Response::$statusTexts[$responseCode], 'responseDetails' => $message, 'errors' => $errors, 'data' => $data);
            $xml_data = new \SimpleXMLElement('<?xml version="1.0"?><data></data>');
            $commoObj = new Helpers();
            $result = $commoObj->conv($result,$xml_data);  
            $response = new Response($xml_data->asXML(),$responseCode);
            $response->headers->set('Content-Type', 'application/xml');
            $secureHeaders->send();
            return $response;
        } else {
            $secureHeaders->send();
            $arr =array('statusCode' => $responseCode, 'responsePhrase' => Response::$statusTexts[$responseCode], 'responseDetails' => $message, 'errors' => $errors, 'data' => $data); 
            return  $arr;

        }
    }

    

}


?>