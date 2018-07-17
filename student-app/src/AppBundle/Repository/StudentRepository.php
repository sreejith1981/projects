<?php
namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;


class StudentRepository extends EntityRepository
{
    public function findAllOrderedByName()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT p FROM AppBundle:Student p ORDER BY p.name ASC'
            )
            ->getResult();
    }



    public function addStudent(\AppBundle\Entity\Student $student)
    {

    }
}
?>
