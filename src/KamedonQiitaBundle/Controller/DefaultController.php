<?php

namespace KamedonQiitaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        $this->get('memcache.default')->set('someKey', 'test', 100000);
        $msg = $this->get('memcache.default')->get('someKey');
        return array('name' => $msg);
    }
}
