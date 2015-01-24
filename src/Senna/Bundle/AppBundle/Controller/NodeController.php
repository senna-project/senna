<?php

namespace Senna\Bundle\AppBundle\Controller;

use Senna\Bundle\AppBundle\Model\Node;
use Symfony\Component\HttpFoundation\Request;
use Sylius\Bundle\ResourceBundle\Controller\ResourceController;
use Senna\Bundle\AppBundle\Model\NodeData;

class NodeController extends ResourceController
{
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
    public function registerAction(Request $request)
    {
        $data = $request->query->all();
        $node = $this->get('senna.repository.node')->findOneBy(array('code' => $data['sender']));

        $nodeData = (new NodeData())
            ->setNode($node)
            ->setData($data['data'])
        ;

        $resource = $this->domainManager->create($nodeData);

        exit;

        return $this->handleView($this->view($resource, 201));
    }
}