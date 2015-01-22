<?php

namespace Senna\Bundle\AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

class DashboardController extends Controller
{
    public function mainAction()
    {
        return $this->render('@SennaApp/dashboard.html.twig');
    }
}