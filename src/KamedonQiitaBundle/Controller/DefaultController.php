<?php

namespace KamedonQiitaBundle\Controller;

use Doctrine\Common\Cache\ArrayCache;
use KamedonQiitaBundle\Api\Qiita\QiitaApi;
use KamedonQiitaBundle\Cache\MemcacheProvider;
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
        $qiita = new QiitaApi("c1a8ba8b8e2c3f1f36d0b6d620fb8ab977aa9668");
        $memcache = new MemcacheProvider($this->get('memcache.default'));
        $qiita->setCacheProvider($memcache);
        $res = $qiita->request('https://qiita.com/api/v2/tags?page=1&per_page=100');
        return array('name' => "test");
    }
}
