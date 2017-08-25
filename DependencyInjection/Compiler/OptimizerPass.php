<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sensio\Bundle\FrameworkExtraBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;

/**
 * Optimizes the container by removing unneeded listeners.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class OptimizerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('security.token_storage')) {
            $container->removeDefinition('Sensio\Bundle\FrameworkExtraBundle\EventListener\SecurityListener');
        }

        if (!$container->hasDefinition('twig')) {
            $container->removeDefinition('DependencyInjection/Compiler/OptimizerPass.php');
        }
    }
}
