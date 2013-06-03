<?php

namespace Kristofvc\DashboardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Kristofvc\DashboardBundle\Model\BlockInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * This file is part of the DashboardBundle and represents a block in your dashboard
 * 
 * @ORM\Entity
 * @ORM\Table(name="block_node")
 */
class Node
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
     * @ORM\Column(type="integer")
     */
    protected $block_id;

    /**
     * @ORM\Column(type="string")
     */    
    protected $class;
    
    protected $block;
    
    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    protected $page; 
    
    /**
     * @ORM\ManyToOne(targetEntity="Kristofvc\DashboardBundle\Entity\Column", inversedBy="nodes")
     */
    protected $column;
    
    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    protected $position; 
    
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
     * Set block_id
     *
     * @param integer $blockId
     * @return Node
     */
    public function setBlockId($blockId)
    {
        $this->block_id = $blockId;
    
        return $this;
    }

    /**
     * Get block_id
     *
     * @return integer 
     */
    public function getBlockId()
    {
        return $this->block_id;
    }

    /**
     * Set class
     *
     * @param string $class
     * @return Node
     */
    public function setClass($class)
    {
        $this->class = $class;
    
        return $this;
    }

    /**
     * Get class
     *
     * @return string 
     */
    public function getClass()
    {
        return $this->class;
    }
    
    public function getBlock() {
        return $this->block;
    }

    public function setBlock(BlockInterface $block) {
        $this->block = $block;
    }

    /**
     * Set page
     *
     * @param integer $page
     * @return Node
     */
    public function setPage($page)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Get page
     *
     * @return integer 
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * Set position
     *
     * @param integer $position
     * @return Node
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return integer 
     */
    public function getPosition()
    {
        return $this->position;
    }
    
    public function renderBlock(ContainerInterface $container) 
    {
        $block = $container->get('doctrine')->getRepository($this->getClass())->find($this->getBlockId());
        
        return $block->renderBlock($container);
    }

    /**
     * Set column
     *
     * @param \Kristofvc\DashboardBundle\Entity\Column $column
     * @return Node
     */
    public function setColumn(\Kristofvc\DashboardBundle\Entity\Column $column = null)
    {
        $this->column = $column;

        return $this;
    }

    /**
     * Get column
     *
     * @return \Kristofvc\DashboardBundle\Entity\Column 
     */
    public function getColumn()
    {
        return $this->column;
    }
}
