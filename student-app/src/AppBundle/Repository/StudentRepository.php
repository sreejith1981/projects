<?php
namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;


class StudentRepository extends EntityRepository
{
    public function getStudent()
    {
        return $this->findBy([], ['name' => 'ASC']);
    }



    public function listStudent($name)
    {
        $query;

        $query = $this->createQueryBuilder('sr')
               ->where('sr.name LIKE :name')
               ->setParameter('name', '%'.$name.'%')
               ->getQuery();

        return $query;
    }



    public function addStudent(\AppBundle\Entity\Student $student)
    {
        $this->_em->persist($student);
        $this->_em->flush();
    }



    public function deleteStudent($id)
    {
        $student = $this->find($id);

        if(!$student)
        {
            throw $this->createNotFoundException('No student found for id ' . $id);
        }

        $this->getEntityManager()->remove($student);
        $this->getEntityManager()->flush();
    }
}
?>
