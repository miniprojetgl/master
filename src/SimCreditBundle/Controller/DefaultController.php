<?php

namespace SimCreditBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@SimCredit/Default/index.html.twig');
    }
}
