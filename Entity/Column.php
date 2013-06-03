<?php

namespace Kristofvc\DashboardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * This file is part of the PagesBundle and represents a page in your website
 * 
 * @ORM\Entity
 * @ORM\Table(name="page_column")
 */
class Column
{
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Kristofvc\DashboardBundle\Entity\Page", inversedBy="columns")
     */
    protected $page;
    
    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    protected $span; 
    
    /**
     * @ORM\OneToMany(targetEntity="Kristofvc\DashboardBundle\Entity\Node", mappedBy="column")
     * @ORM\OrderBy({ "position" = "asc" })
     */
    protected $nodes;
    
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
     * Constructor
     */
    public function __construct()
    {
        $this->nodes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set span
     *
     * @param integer $span
     * @return Column
     */
    public function setSpan($span)
    {
        $this->span = $span;

        return $this;
    }

    /**
     * Get span
     *
     * @return integer 
     */
    public function getSpan()
    {
        return $this->span;
    }

    /**
     * Set page
     *
     * @param \Kristofvc\DashboardBundle\Entity\Page $page
     * @return Column
     */
    public function setPage(\Kristofvc\DashboardBundle\Entity\Page $page = null)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Get page
     *
     * @return \Kristofvc\DashboardBundle\Entity\Page 
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * Add nodes
     *
     * @param \Kristofvc\DashboardBundle\Entity\Node $nodes
     * @return Column
     */
    public function addNode(\Kristofvc\DashboardBundle\Entity\Node $nodes)
    {
        $this->nodes[] = $nodes;

        return $this;
    }

    /**
     * Remove nodes
     *
     * @param \Kristofvc\DashboardBundle\Entity\Node $nodes
     */
    public function removeNode(\Kristofvc\DashboardBundle\Entity\Node $nodes)
    {
        $this->nodes->removeElement($nodes);
    }

    /**
     * Get nodes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getNodes()
    {
        return $this->nodes;
    }
}
