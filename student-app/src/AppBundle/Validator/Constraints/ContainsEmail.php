<?php
namespace AppBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class ContainsEmail extends Constraint
{
    public $message = 'The string "{{ string }}" contains an invalid email.';
}
?>
