<?php

namespace Payever\TestBundle\Repository;

/**
 * AlbumRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AlbumRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * Get Watch by brand, model and sku
     *
     * @param integer $amountImagesPerAlbum
     * @return \Payever\TestBundle\Entity\Album[]
     */
    public function getByImagesAmount($amountImagesPerAlbum) {
        $query = $this->createQueryBuilder('a');
        $query->select('a as album, COUNT(i) as c');
        $query->innerJoin('a.images', 'i');
        $query->groupBy('a');
        $query->having('c < :amount');
        $query->setParameter('amount', $amountImagesPerAlbum);
        $result = $query->getQuery()->getResult();
        
        return $result;
    }
}
