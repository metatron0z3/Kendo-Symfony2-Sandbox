<?php

namespace SDI\ChameleonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Franchises
 *
 * @ORM\Table(name="franchises")
 * @ORM\Entity
 */
class Franchises
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
     * @ORM\Column(name="name", type="text", nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=20, nullable=true)
     */
    private $status;

    /**
     * @var \TEST\TestBundle\Entity\Clients
     *
     * @ORM\ManyToOne(targetEntity="TEST\TestBundle\Entity\Clients")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     * })
     */
    private $client;



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
     * @return Franchises
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
     * Set status
     *
     * @param string $status
     * @return Franchises
     */
    public function setStatus($status)
    {
        $this->status = $status;
    
        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set client
     *
     * @param \TEST\TestBundle\Entity\Clients $client
     * @return Franchises
     */
    public function setClient(\TEST\TestBundle\Entity\Clients $client = null)
    {
        $this->client = $client;
    
        return $this;
    }

    /**
     * Get client
     *
     * @return \TEST\TestBundle\Entity\Clients 
     */
    public function getClient()
    {
        return $this->client;
    }
}