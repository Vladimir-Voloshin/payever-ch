<?php

namespace Payever\TestBundle\Repository;

/**
 * ImageRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ImageRepository extends \Doctrine\ORM\EntityRepository
{
	/**
	 * Get images by album id
	 *
	 * @param integer $albumId
	 * @return \Payever\TestBundle\Entity\Image[]
	 */
	public function getAlbumImagesQuery($albumId){
		$query = $this->createQueryBuilder('i');
		$query->where('i.album = :album');
		$query->setParameter('album', $albumId);
		
		return $query->getQuery();
	}
}
