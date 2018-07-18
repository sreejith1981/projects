<?php
namespace AppBundle\Validator;

use Symfony\Component\Validator\Constraints\Email as EmailConstraint;

class StudentValidator
{
    /**
     * Validates a single email address (or an array of email addresses)
     *
     * @param array|string $emails
     *
     * @return array
     */
    public function validateEmails($emails)
    {
        $errors = array();
        $emails = is_array($emails) ? $emails : array($emails);

        $validator = $this->container->get('validator');

        $constraints = array(
            new \Symfony\Component\Validator\Constraints\Email(),
            new \Symfony\Component\Validator\Constraints\NotBlank()
        );

        foreach ($emails as $email)
        {
            $error = $validator->validateValue($email, $constraints);

            if (count($error) > 0)
            {
                $errors[] = $error;
            }
        }

        return $errors;
    }
}
?>
