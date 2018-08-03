<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;
use AppBundle\Lib\Helpers;
class DefaultController extends ApiController
{
    
    /**
        * @Rest\Post("v1/jwttest")
        
        * @param Request $request
 
    */
	public function jwttest( Request $request ) 
	{ 
        try {
            $postData               =   $request->request->all(); 
            $checkAccess            =   $this->checkApiAccess($request);
            if($checkAccess['statusCode'] ==  Response::HTTP_OK) {
                $returnData             =  Helpers::returnData(Response::HTTP_OK,null,null,null);
            } else {
                $returnData             =  Helpers::returnData(Response::HTTP_BAD_REQUEST,null,null,null);
            }
            
            return $returnData;
        } catch(Exception $e) {

        }
       
        
    }
  


}
