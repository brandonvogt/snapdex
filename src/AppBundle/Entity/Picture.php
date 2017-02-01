<?php

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="pictures")
 */
class Picture
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /** @ORM\Column(type="text") */
    private $caption;
    /** @ORM\Column(type="guid") */
    private $guid;
    /** @ORM\Column(name="pokemon_id", type="integer") */
    private $pokemon_id;
    /** @ORM\Column(type="integer") */
    private $user_id;
    /** @ORM\Column(type="integer") */
    private $vote_count;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="pictures")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;
    
    /**
     * @ORM\ManyToOne(targetEntity="Pokemon", inversedBy="pictures")
     * @ORM\JoinColumn(name="pokemon_id", referencedColumnName="id")
     */
    private $pokemon;
    
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
     * Set caption
     *
     * @param string $caption
     *
     * @return Picture
     */
    public function setCaption($caption)
    {
        $this->caption = $caption;

        return $this;
    }

    /**
     * Get caption
     *
     * @return string
     */
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * Set guid
     *
     * @param guid $guid
     *
     * @return Picture
     */
    public function setGuid($guid)
    {
        $this->guid = $guid;

        return $this;
    }

    /**
     * Get guid
     *
     * @return guid
     */
    public function getGuid()
    {
        return $this->guid;
    }

    /**
     * Set pokemonId
     *
     * @param integer $pokemonId
     *
     * @return Picture
     */
    public function setPokemonId($pokemonId)
    {
        $this->pokemon_id = $pokemonId;

        return $this;
    }

    /**
     * Get pokemonId
     *
     * @return integer
     */
    public function getPokemonId()
    {
        return $this->pokemon_id;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     *
     * @return Picture
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
     * Set voteCount
     *
     * @param integer $voteCount
     *
     * @return Picture
     */
    public function setVoteCount($voteCount)
    {
        $this->vote_count = $voteCount;

        return $this;
    }

    /**
     * Get voteCount
     *
     * @return integer
     */
    public function getVoteCount()
    {
        return $this->vote_count;
    }
    
    /**
     * Set user
     *
     * @param \AppBundle\Entity\Users $user
     *
     * @return Picture
     */
    public function setUser(\AppBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\Users
     */
    public function getUser()
    {
        return $this->user;
    }
    
    /**
     * Set pokemon
     *
     * @param \AppBundle\Entity\Pokemon $pokemon
     *
     * @return Picture
     */
    public function setPokemon(\AppBundle\Entity\Pokemon $pokemon = null)
    {
        $this->pokemon = $pokemon;

        return $this;
    }

    /**
     * Get pokemon
     *
     * @return \AppBundle\Entity\Pokemon
     */
    public function getPokemon()
    {
        return $this->pokemon;
    }
}