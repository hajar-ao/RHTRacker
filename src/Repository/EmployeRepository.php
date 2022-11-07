<?php

namespace App\Repository;

use App\Entity\Employe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Employe>
 *
 * @method Employe|null find($id, $lockMode = null, $lockVersion = null)
 * @method Employe|null findOneBy(array $criteria, array $orderBy = null)
 * @method Employe[]    findAll()
 * @method Employe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmployeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Employe::class);
    }

    public function save(Employe $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Employe $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
     /**
     * 
     * @return int
     */
    public function CountByIdEmploye()
    {
        return $this->createQueryBuilder('e')
    
        ->select('count(e.id)')
        ->getQuery()
        ->getSingleScalarResult()
        ;
    }
    /**
     * 
     * @return int
     */
    public function CountByIdRetraiter()
    {
        return $this->createQueryBuilder('e')
    
        ->select('count(e.id)')
        ->getQuery()
        ->getSingleScalarResult()
        ;
    }


   
      
}
