<?php
namespace AppBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class ContainsAlpha extends Constraint
{
    public $message = 'The string "{{ string }}" contains an illegal character: it can only contain letters or space.';
}
?>
