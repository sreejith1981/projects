<?php

namespace AppBundle\Validator\Constraints;

/**
    * File name   : ValidDomain.php
    * Created by  : Sreejith (sreejith@vinamsolutions.com)
    * Created on  : 27-07-2018
    * Description : It is a customized constraint class for
                    validating domain.
 */

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class ValidDomain extends Constraint
{
    public $message = 'The string "{{ string }}" is an ivalid domain.';
}
?>
