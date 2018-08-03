<?php

namespace AppBundle\Controller;

/**
    * File name   : RegisterController.php
    * Created by  : Sreejith (sreejith@vinamsolutions.com)
    * Created on  : 26-07-2018
    * Description : It is controller class used to
                    register, confirm and re-register clients
 */

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use AppBundle\Entity\Client;
use Doctrine\ORM\EntityManagerInterface;
use AppBundle\Validator\Validator;
use AppBundle\Lib\Helpers;
use AppBundle\Lib\Mailer;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;



class RegisterController extends ApiController
{

    /**
        * @Rest\Post("v1/register")

        * @param Request $request, Validator $validator, Mailer $mailer

    */
	public function addAction(Request $request, Validator $validator, Mailer $mailer)
	{
        $postData    = $request->request->all();
        // $content  = $request->getContent();
        $checkAccess = $this->checkApiAccess($request);

        if ($checkAccess['statusCode'] == Response::HTTP_OK) {
            $client    = new Client();
            $client   -> setEmail($postData["email"]);
            $hash      = password_hash($postData["password"], PASSWORD_DEFAULT);
            // if (password_verify($postData["password"], $hash)) { // do something }
            $client   -> setPassword($hash);
            $client   -> setOrganizationName($postData["organizationName"]);
            $client   -> setDomain($postData["domain"]);
            $client   -> setStatus(0);
            $date      = new \DateTime('now');
            $client   -> setCreatedDatetime($date);
            $uuid1     = Uuid::uuid1();
            $client   -> setCode($uuid1);
            $checkMail = $this->getDoctrine()->getRepository(Client::class)->getClient($client->getEmail());


            if(count($checkMail) !== 0) {
                $returnData = Helpers::returnData(Response::HTTP_NOT_ACCEPTABLE, 'The email already registered.', null, 'Already exist', 'json');
            } else {
                $errors = $validator->validateRegister($client);

                if (0 !== count($errors)) {
                    $returnData = Helpers::returnData(Response::HTTP_NOT_ACCEPTABLE, $errors, null, 'Error occurred', 'json');
                } else {
                    $success = $this->getDoctrine()->getRepository(Client::class)->addClient($client);

                    if($success) {
                        $code        = $client->getCode();
                        $email       = $client->getEmail();
                        $subject     = 'Response Required: Please confirm your request for registration.';
                        $body        = "Please click the button below to confirm register in 'dmarc.local'.<br><a href='"
                                        .$this->getParameter('register_confirm_url')."?code=".$code."'>Confirm</a>";
                        $altBody     = 'This is the body in plain text for non-HTML mail clients';
                        //$mailer     -> sendMail($email, $subject, $body, $altBody);

                        $normalizer  = new ObjectNormalizer();
                        $normalizer -> setIgnoredAttributes(array('code'));
                        $encoder     = new JsonEncoder();
                        $serializer  = new Serializer(array($normalizer), array($encoder));
                        $jsonContent = $serializer->serialize($client, 'json');

                        $returnData  = Helpers::returnData(Response::HTTP_CREATED, null, $jsonContent, 'Saved Successfully', 'json');
                    } else {
                        $returnData  = Helpers::returnData(Response::HTTP_NOT_ACCEPTABLE, 'Error occurred on save', null, 'Failed', 'json');
                    }
                }
            }
        } else {
            $returnData = Helpers::returnData(Response::HTTP_BAD_REQUEST, null, null, null);
        }

        return $returnData;
    }




    /**
     * @Rest\Post("v1/confirm")
     *
     * @param Request $request
     */
    public function confirmRequestAction(Request $request)
    {
        $postData    = $request->request->all();
        $code        = $postData["code"];
        $email       = $postData["email"];
        $checkAccess = $this->checkApiAccess($request);

        if($checkAccess['statusCode'] == Response::HTTP_OK) {
            $checkMail = $this->getDoctrine()->getRepository(Client::class)->checkClient($code, $email);

            if (0 !== count($checkMail)) {
                $client  = new Client();
                $client  = $checkMail[0];
                $client -> setStatus(1);
                $client -> setCode(null);
                $success = $this->getDoctrine()->getRepository(Client::class)->addClient($client);

                if ($success) {
                    $normalizer  = new ObjectNormalizer();
                    $normalizer -> setIgnoredAttributes(array('code'));
                    $encoder     = new JsonEncoder();
                    $serializer  = new Serializer(array($normalizer), array($encoder));
                    $jsonContent = $serializer->serialize($client, 'json');

                    $returnData  = Helpers::returnData(Response::HTTP_OK, null, $jsonContent, 'Confirmed successfully', 'json');
                } else {
                    $returnData  = Helpers::returnData(Response::HTTP_NOT_ACCEPTABLE, 'Error occurred', null, 'Confirm failed', 'json');
                }
            } else {
                $returnData = Helpers::returnData(Response::HTTP_FORBIDDEN, "User don't have permission to confirm", null, 'Failed on confirmation', 'json');
            }
        } else {
            $returnData = Helpers::returnData(Response::HTTP_BAD_REQUEST, null, null, null);
        }

        return $returnData;
    }




    /**
     * @Rest\Post("v1/recover")
     *
     * @param Request $request, Mailer $mailer
     */
    public function passwordRecoverAction(Request $request, Mailer $mailer)
    {
        $postData    = $request->request->all();
        $email       = $postData["email"];
        $checkAccess = $this->checkApiAccess($request);

        if($checkAccess['statusCode'] == Response::HTTP_OK) {
            $checkMail = $this->getDoctrine()->getRepository(Client::class)->getClient($email);

            if (0 !== count($checkMail)) {
                $client  = new Client();
                $client  = $checkMail[0];
                $uuid1   = Uuid::uuid1();
                $client -> setCode($uuid1);
                $success = $this->getDoctrine()->getRepository(Client::class)->addClient($client);

                if($success) {
                    $code        = $client->getCode();
                    $email       = $client->getEmail();
                    $subject     = 'Response Required: Please confirm your request for registration.';
                    $body        = "Please click the button below to confirm register in 'dmarc.local'.<br><a href='"
                                   .$this->getParameter('register_confirm_url')."?code=".$code."'>Confirm</a>";
                    $altBody     = 'This is the body in plain text for non-HTML mail clients';
                    //$mailer     -> sendMail($email, $subject, $body, $altBody);

                    $normalizer  = new ObjectNormalizer();
                    $normalizer -> setIgnoredAttributes(array('code'));
                    $encoder     = new JsonEncoder();
                    $serializer  = new Serializer(array($normalizer), array($encoder));
                    $jsonContent = $serializer->serialize($client, 'json');

                    $returnData  = Helpers::returnData(Response::HTTP_OK, null, $jsonContent, 'Confirmation mail is send.', 'json');
                } else {
                    $returnData  = Helpers::returnData(Response::HTTP_NOT_ACCEPTABLE, 'Error occurred', null, 'Failed on recover password', 'json');
                }
            } else {
                $returnData = Helpers::returnData(Response::HTTP_NOT_ACCEPTABLE, 'Invalid email address.', null, 'Permission denied', 'json');
            }
        } else {
            $returnData = Helpers::returnData(Response::HTTP_BAD_REQUEST, null, null, null);
        }

        return $returnData;
    }




    /**
     * @Rest\Post("v1/reset")
     *
     * @param Request $request, Validator $validator
     */
    public function passwordResetAction(Request $request, Validator $validator)
    {
        $postData    = $request->request->all();
        $email       = $postData["email"];
        $code        = $postData["code"];
        $password    = $postData["password"];
        $confirmPwd  = $postData["confirmPassword"];
        $checkAccess = $this->checkApiAccess($request);

        if($checkAccess['statusCode'] == Response::HTTP_OK) {
            $checkMail = $this->getDoctrine()->getRepository(Client::class)->checkClient($code, $email);

            if (0 !== count($checkMail)) {
                $errors = $validator->validatePassword($password);

                if (0 !== count($errors)) {
                    $returnData = Helpers::returnData(Response::HTTP_NOT_ACCEPTABLE, $errors, null, 'Error occurred', 'json');
                } else {
                    if(0 == strcmp($password, $confirmPwd)) {
                        $client  = new Client();
                        $client  = $checkMail[0];
                        $hash    = password_hash($password, PASSWORD_DEFAULT);
                        $client -> setPassword($hash);
                        $client -> setCode(null);
                        $success = $this->getDoctrine()->getRepository(Client::class)->addClient($client);

                        if ($success) {
                            $normalizer  = new ObjectNormalizer();
                            $normalizer -> setIgnoredAttributes(array('code'));
                            $encoder     = new JsonEncoder();
                            $serializer  = new Serializer(array($normalizer), array($encoder));
                            $jsonContent = $serializer->serialize($client, 'json');

                            $returnData  = Helpers::returnData(Response::HTTP_CREATED, null, $jsonContent, 'Password reset successfully', 'json');
                        } else {
                            $returnData  = Helpers::returnData(Response::HTTP_NOT_ACCEPTABLE, 'Error occured on save', null, 'Password reset failed', 'json');
                        }
                    } else {
                        $returnData = Helpers::returnData(Response::HTTP_NOT_ACCEPTABLE, 'Mismatch in password and confirm password', null, 'Error occurred', 'json');
                    }
                }
            } else {
                $returnData = Helpers::returnData(Response::HTTP_FORBIDDEN, "User don't have permission to reset password", null, 'Failed to reset password', 'json');
            }
        } else {
            $returnData = Helpers::returnData(Response::HTTP_BAD_REQUEST, null, null, null);
        }

        return $returnData;
    }
}
?>
