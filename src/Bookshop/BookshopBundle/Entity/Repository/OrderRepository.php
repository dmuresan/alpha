<?php

namespace Bookshop\BookshopBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * OrderRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class OrderRepository extends EntityRepository {

    public function getOrderForUser($userID) {
        $qd = $this->createQueryBuilder('c')
                ->select('c')
                ->where('c.user = :user_id')
                ->setParameter('user_id', $userID);
        return $qd->getQuery()
                        ->getOneOrNullResult();
    }

}