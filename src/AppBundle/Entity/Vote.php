<?php

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="votes")
 */

class Vote
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /** @ORM\Column(type="integer") */
    private $user_id;
    /** @ORM\Column(type="integer") */
    private $picture_id;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     *
     * @return Vote
     */
    public function setUserId($userId)
    {
        $this->user_id = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return integer
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set pictureId
     *
     * @param integer $pictureId
     *
     * @return Vote
     */
    public function setPictureId($pictureId)
    {
        $this->picture_id = $pictureId;

        return $this;
    }

    /**
     * Get pictureId
     *
     * @return integer
     */
    public function getPictureId()
    {
        return $this->picture_id;
    }
}
