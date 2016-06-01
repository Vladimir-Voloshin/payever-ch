<?php

namespace AppBundle\Entity;

use AppBundle\Entity\BaseEntity;
/**
 * Image
 */
class Image extends BaseEntity
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $imageName;

    /**
     * @var \DateTime
     */
    private $created;

    /**
     * @var \DateTime
     */
    private $updated;

    /**
     * @var \AppBundle\Entity\Album
     */
    private $album;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set imageName
     *
     * @param string $imageName
     *
     * @return Image
     */
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;

        return $this;
    }

    /**
     * Get imageName
     *
     * @return string
     */
    public function getImageName()
    {
        return $this->imageName;
    }

    /**
     * Get album
     *
     * @return Album
     */
    public function getImage()
    {
        return $this->album;
    }

    /**
     * Set album
     *
     * @param \AppBundle\Entity\Album $album
     * @return Image
     */
    public function setImage(Album $album = null)
    {
        $this->album = $album;

        return $this;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Image
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     *
     * @return Image
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }
}

