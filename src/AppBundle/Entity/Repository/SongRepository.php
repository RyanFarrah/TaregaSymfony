<?php

namespace AppBundle\Entity\Repository;

/**
 * SongRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class SongRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * Récupère les song avec l'id de l'user associé
     *
     * @param int $id
     * @return mixed
     */
    public function findByUser($id) {
        $qb = $this->getEntityManager()->createQueryBuilder();

        $qb->select('s')
        ->from('AppBundle\Entity\Song', 's')
        ->join('s.user', 'u', 'WITH', 's.user = :id');

        $qb->setParameter('id', $id);

        return $qb->getQuery()->getResult();
    }
}
