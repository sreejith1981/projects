<?php

namespace AppBundle\Validator;

/**
    * File name   : Validator.php
    * Created by  : Sreejith (sreejith@vinamsolutions.com)
    * Created on  : 27-07-2018
    * Description : Is a class for validating user controls
    	            like email, domain etc.
 */

use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Regex;
use AppBundle\Validator\Constraints\ValidDomain;
use AppBundle\Validator\Constraints\ValidEmail;


class Validator
{
    private $validator;



    public function __construct()
    {
        $this->validator = Validation::createValidator();
    }



    public function validateRegister(\AppBundle\Entity\Client $client)
    {
        $error = [];
        $errorMsg;



        // Email validation
        $violations = $this->validator->validate($client->getEmail(), array(
            new NotBlank(array('message' => 'Email value should not be blank.')),
            new Email(),
            new ValidEmail(),
        ));

        if (0 !== count($violations)) {
            $errorMsg = "";

            foreach ($violations as $violation) {
                $errorMsg .= $violation->getMessage().'<br>';
            }

            $error['email'] = $errorMsg;
        }



        // Password validation
        //$exp = "/(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/";
        $exp = "/(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])/";
        $violations = $this->validator->validate($client->getPassword(), array(
            new NotBlank(array('message' => 'Password should not be blank.')),
            new Length(array('min' => 8, 'minMessage' => 'Password is too short. It should have {{ limit }} characters or more.')),
            new Regex(array('pattern' => $exp, 'match' => true, 'message' => "Password must contain 1 lowercase, 1 uppercase, 1 numeric and one special character.")),
        ));

        if (0 !== count($violations)) {
            $errorMsg = "";

            foreach ($violations as $violation) {
                $errorMsg .= $violation->getMessage().'<br>';
            }

            $error['password'] = $errorMsg;
        }


        // Organisation validation
        $violations = $this->validator->validate($client->getOrganizationName(), array(
            new NotBlank(array('message' => 'Organization Name should not be blank.')),
        ));

        if (0 !== count($violations)) {
            $errorMsg = "";

            foreach ($violations as $violation) {
                $errorMsg .= $violation->getMessage().'<br>';
            }

            $error['organizationName'] = $errorMsg;
        }


        // Domain validation
        $violations = $this->validator->validate($client->getDomain(), array(
            new NotBlank(array('message' => 'Domain should not be blank.')),
            new ValidDomain(),
        ));

        if (0 !== count($violations)) {
            $errorMsg = "";

            foreach ($violations as $violation) {
                $errorMsg .= $violation->getMessage().'<br>';
            }

            $error['domain'] = $errorMsg;
        }

        return $error;
    }




    public function validatePassword($password)
    {
        $error = [];
        $errorMsg;


        // Password validation
        //$exp = "/(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/";
        $exp = "/(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])/";
        $violations = $this->validator->validate($password, array(
            new NotBlank(array('message' => 'Password should not be blank.')),
            new Length(array('min' => 8, 'minMessage' => 'Password is too short. It should have {{ limit }} characters or more.')),
            new Regex(array('pattern' => $exp, 'match' => true, 'message' => "Password must contain 1 lowercase, 1 uppercase, 1 numeric and one special character.")),
        ));

        if (0 !== count($violations)) {
            $errorMsg = "";

            foreach ($violations as $violation) {
                $errorMsg .= $violation->getMessage().'<br>';
            }

            $error['password'] = $errorMsg;
        }

        return $error;
    }
}
?>
