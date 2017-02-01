<?php

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="pokemon")
 */
class Pokemon
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /** @ORM\Column(type="text") */
    private $name;
    /** @ORM\Column(type="text") */
    private $type_1;
    /** @ORM\Column(type="text") */
    private $type_2;

    /**
     * @ORM\OneToMany(targetEntity="Picture", mappedBy="pokemon")
     */
    private $pictures;
    
        public function __construct()
            {
                $this->pictures = new ArrayCollection();
            }
    
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
     * Set name
     *
     * @param string $name
     *
     * @return Pokemon
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set type_1
     *
     * @param string $type_1
     *
     * @return Pokemon
     */
    public function setType1($type_1)
    {
        $this->type_1 = $type_1;

        return $this;
    }

    /**
     * Get type_1
     *
     * @return string
     */
    public function getType1()
    {
        return $this->type_1;
    }

    /**
     * Set type_2
     *
     * @param string $type_2
     *
     * @return Pokemon
     */
    public function setType2($type_2)
    {
        $this->type_2 = $type_2;

        return $this;
    }

    /**
     * Get type_2
     *
     * @return string
     */
    public function getType2()
    {
        return $this->type_2;
    }
    
    /**
     * Add picture
     *
     * @param \AppBundle\Entity\Picture $picture
     *
     * @return Pokemon
     */
    public function addPicture(\AppBundle\Entity\Picture $picture)
    {
        $this->pictures[] = $picture;

        return $this;
    }

    /**
     * Remove picture
     *
     * @param \AppBundle\Entity\Picture $picture
     */
    public function removePicture(\AppBundle\Entity\Picture $picture)
    {
        $this->pictures->removeElement($picture);
    }

    /**
     * Get pictures
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPictures()
    {
        return $this->pictures;
    }
}