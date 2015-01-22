<?php

namespace Senna\Bundle\AppBundle\Menu;

use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\Translation\TranslatorInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Request;
use Knp\Menu\FactoryInterface;


class MenuBuilder
{
    protected $factory;
    protected $translator;
    protected $securityContext;
    protected $eventDispatcher;
    protected $request;
    /**
     * @param FactoryInterface         $factory
     * @param SecurityContextInterface $securityContext
     * @param TranslatorInterface      $translator
     */
    public function __construct(FactoryInterface $factory, SecurityContextInterface $securityContext, TranslatorInterface $translator, EventDispatcherInterface $eventDispatcher)
    {
        $this->factory = $factory;
        $this->translator = $translator;
        $this->securityContext  = $securityContext;
        $this->eventDispatcher  = $eventDispatcher;
    }
    /**
     * @param $label
     * @param array $parameters
     * @return string
     */
    protected function translate($label, $parameters = array())
    {
        return $this->translator->trans($label, $parameters);
    }
    /**
     * @param Request $request
     */
    public function setRequest(Request $request = null)
    {
        $this->request = $request;
    }

    public function mainMenu()
    {
        $menu = $this->factory->createItem('root');
        $menu
            ->setChildrenAttribute('class', 'nav navbar-nav')
            ->setChildrenAttribute('id', 'menu');


        $menu->addChild(
            $this->translate('senna.menu.dashboard'),
            array('route' => 'dashboard')
        );

        $menu->addChild(
            $this->translate('senna.menu.rooms'),
            array('route' => 'rooms')
        );

        $menu->addChild(
            $this->translate('senna.menu.command'),
            array('uri' => 'rooms')
        );

        $menu->addChild(
            $this->translate('senna.menu.settings'),
            array('route' => 'settings')
        );

        return $menu;
    }
}