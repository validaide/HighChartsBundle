<?php

namespace Validaide\HighChartsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Validaide\HighChartsBundle\Graph;

class DefaultController extends Controller
{
    /**
     * @Route(path="/",name="home")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $graph = new Graph();

        return $this->render(
            'HighChartsBundle:Default:index.html.twig',
            [
                'graph' => $graph,
            ]
        );
    }
}
