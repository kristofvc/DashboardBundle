<?php

namespace Kristofvc\DashboardBundle\Model;

use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Description of BlockInterface
 *
 * @author kristof
 */
interface BlockInterface
{
    public function renderBlock(ContainerInterface $container);
}

?>
