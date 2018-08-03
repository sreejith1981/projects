<?php

namespace AppBundle\Repository;

/**
    * File name   : RegisterRepository.php
    * Created by  : Sreejith (sreejith@vinamsolutions.com)
    * Created on  : 26-07-2018
    * Description : It is customized repository class for get,
		    check and save client.
 */

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Validator\Constraints\DateTime;


class RegisterRepository extends EntityRepository
{
    public function getClient($email)
    {
        $query;

        $query = $this->createQueryBuilder('cl')
               ->where('cl.email = :email')
               ->setParameter('email', $email)
               ->getQuery()->getResult();

        return $query;
    }



    public function checkClient($code, $email)
    {
        $query;

        $query = $this->createQueryBuilder('cl')
            ->where('cl.code = :code')->setParameter('code', $code)
            ->andWhere('cl.email = :email')->setParameter('email', $email)
            ->getQuery()->getResult();

        return $query;
    }



    public function addClient(\AppBundle\Entity\Client $client)
    {
        $success = false;

        try {

            $this->getEntityManager()->persist($client);
            $this->getEntityManager()->flush();

            $success = true;
        }
        catch(Exception $ex) {
            throw ex;
        }

        return $success;
    }
}
?>
