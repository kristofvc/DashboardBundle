<?php

namespace Kristofvc\DashboardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    
    /**
     * @Route("/", name="dashboard_index")
     * @Template()
     */
    public function indexAction()
    {
        // $nodes = $this->getDoctrine()->getRepository("KristofvcDashboardBundle:Node")->findBy(array(), array('page' => 'asc', 'column' => 'asc', 'position' => 'asc'));
        $pages = $this->getDoctrine()->getRepository("KristofvcDashboardBundle:Page")->findAll();
         
        return array('pages' => $pages, 'container' => $this->container);
    }
}
