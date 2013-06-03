<?php

namespace Kristofvc\DashboardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Kristofvc\DashboardBundle\Model\BlockInterface;

/**
 * This file is part of the PagesBundle and represents a page in your website
 * 
 * @ORM\Entity
 * @ORM\Table(name="page")
 */
class Page
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
     * @ORM\OneToMany(targetEntity="Kristofvc\DashboardBundle\Entity\Column", mappedBy="page")
     */
    protected $columns;
    
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
        $this->columns = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add columns
     *
     * @param \Kristofvc\DashboardBundle\Entity\Column $columns
     * @return Page
     */
    public function addColumn(\Kristofvc\DashboardBundle\Entity\Column $columns)
    {
        $this->columns[] = $columns;

        return $this;
    }

    /**
     * Remove columns
     *
     * @param \Kristofvc\DashboardBundle\Entity\Column $columns
     */
    public function removeColumn(\Kristofvc\DashboardBundle\Entity\Column $columns)
    {
        $this->columns->removeElement($columns);
    }

    /**
     * Get columns
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getColumns()
    {
        return $this->columns;
    }
}
