<?php
namespace AppBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class ValidDomainValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
        // custom constraints should ignore null and empty values to allow
        // other constraints (NotBlank, NotNull, etc.) take care of that
        if (null === $value || '' === $value) {
            return;
        }

    	if (!is_string($value)) {
            throw new UnexpectedTypeException($value, 'string');
        }


        if (!$this->is_valid_domain($value)) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ string }}', $value)
                ->addViolation();
        }
    }



    function is_valid_domain($domain)
    {
        if(checkdnsrr($domain,"MX")) {
            return true;
        }
        else {
            return false;
        }
    }
}
?>
