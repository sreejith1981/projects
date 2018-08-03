<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use AppBundle\Lib\Validate;
use AppBundle\Lib\JwtTokenAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Encoder\JWTEncoderInterface;
class ApiController extends Controller
{
    function __construct(JWTEncoderInterface $jwtEncoder, EntityManagerInterface $em) {   
              
    }
    public function checkApiAccess(Request $request) 
    { 
        $validateObj        =   new Validate();
        $headers            =   $request->headers->all(); 
        $requestChecking    =    $validateObj ->checkRequestValid($headers);  
        if($requestChecking['statusCode'] == Response::HTTP_OK) {
            return $requestChecking;
        } else {
            return $requestChecking;
        }
        
    }
   
}
