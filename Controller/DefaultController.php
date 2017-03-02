<?php
/**
 * File: DefaultController.php
 * Date: 02/03/17
 *
 * @package  Validaide
 * @author   Marcel Tuinstra <marcel.tuinstra@validaide.com>
 * @link     http://www.marcel-tuinstra.com
 */

namespace Validaide\HighChartsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class: DefaultController
 *
 * @package  Validaide
 * @author   Marcel Tuinstra <marcel.tuinstra@validaide.com>
 */
class DefaultController extends Controller
{
    /**
     * General information about method
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->render('HighChartsBundle:Default:index.html.twig');
    }
}
