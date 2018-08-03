<?php

namespace AppBundle\Validator\Constraints;

/**
    * File name   : ValidEmail.php
    * Created by  : Sreejith (sreejith@vinamsolutions.com)
    * Created on  : 27-07-2018
    * Description : Is a customized constraint class for
                    validating email.
 */

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class ValidEmail extends Constraint
{
    public $message = 'The string "{{ string }}" is an invalid email.';
}
?>
