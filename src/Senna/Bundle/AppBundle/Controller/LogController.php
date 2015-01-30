<?php

namespace Senna\Bundle\AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sylius\Bundle\ResourceBundle\Controller\ResourceController;
use Senna\Bundle\AppBundle\Model\Log;

class LogController extends ResourceController
{
    public function createAction(Request $request)
    {
        $level = $request->get('level');
        $message = $request->get('message');

        $nodeData = (new Log())
            ->setType($level)
            ->setContent($message)
        ;

        $resource = $this->domainManager->create($nodeData);

        return $this->handleView($this->view($resource, 201));
    }
}