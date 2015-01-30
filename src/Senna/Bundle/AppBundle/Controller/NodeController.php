<?php

namespace Senna\Bundle\AppBundle\Controller;

use Senna\Bundle\AppBundle\Model\Node;
use Symfony\Component\HttpFoundation\Request;
use Sylius\Bundle\ResourceBundle\Controller\ResourceController;
use Senna\Bundle\AppBundle\Model\NodeData;

class NodeController extends ResourceController
{
    /**
     * @param Node $node
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function dataAction(Node $node)
    {
        $node->getData();

        $view = $this
            ->view()
            ->setTemplate($this->config->getTemplate('show.html'))
            ->setTemplateVar('node')
            ->setData($node)
        ;

        return $this->handleView($view);
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function registerAction(Request $request)
    {
        $sender = $request->request->get('sender');
        $data = $request->request->get('data');

        $node = $this->get('senna.repository.node')->findOneBy(array('code' => $sender));

        $nodeData = (new NodeData())
            ->setNode($node)
            ->setData($data)
        ;

        $resource = $this->domainManager->create($nodeData);

        return $this->handleView($this->view($resource, 201));
    }
}