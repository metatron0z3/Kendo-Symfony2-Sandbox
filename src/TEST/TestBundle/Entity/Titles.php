<?php

namespace TEST\TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Titles
 *
 * @ORM\Table(name="titles")
 * @ORM\Entity
 */
class Titles
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="text", nullable=true)
     */
    private $title;

    /**
     * @var \TEST\TestBundle\Entity\Franchises
     *
     * @ORM\ManyToOne(targetEntity="TEST\TestBundle\Entity\Franchises")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="franchise_id", referencedColumnName="id")
     * })
     */
    private $franchise;

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
     * Set title
     *
     * @param string $title
     * @return Titles
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set franchise
     *
     * @param \TEST\TestBundle\Entity\Franchises $franchise
     * @return Titles
     */
    public function setFranchise(\SDI\ChameleonBundle\Entity\Franchises $franchise = null)
    {
        $this->franchise = $franchise;
    
        return $this;
    }

    /**
     * Get franchise
     *
     * @return \TEST\TestBundle\Entity\Franchises 
     */
    public function getFranchise()
    {
        return $this->franchise;
    }

}