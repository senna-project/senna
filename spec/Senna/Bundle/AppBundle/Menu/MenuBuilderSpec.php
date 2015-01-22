<?php

namespace spec\Senna\Bundle\AppBundle\Menu;

use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\Translation\TranslatorInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Request;
use Knp\Menu\FactoryInterface;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MenuBuilderSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Senna\Bundle\AppBundle\Menu\MenuBuilder');
    }

    function let(FactoryInterface $factory, SecurityContextInterface $securityContext, TranslatorInterface $translator, EventDispatcherInterface $eventDispatcher)
    {
        $this->beConstructedWith( $factory, $securityContext, $translator, $eventDispatcher);
    }
}