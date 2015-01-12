<?php
/**
 * Created by IntelliJ IDEA.
 * User: kamedon
 * Date: 15/01/12
 * Time: 21:54
 */

namespace KamedonQiitaBundle\Controller;

use Doctrine\Common\Cache\ArrayCache;
use KamedonQiitaBundle\Api\Qiita\QiitaApi;
use KamedonQiitaBundle\Cache\MemcacheProvider;
use KamedonQiitaBundle\Entity\Qiita\QiitaSearch;
use KamedonQiitaBundle\Form\QiitaSearchForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/qiita/search")
 */
class QiitaSearchController extends AbstractController
{

    /**
     * @Route("/",name="qiita_search")
     * @template()
     */
    public function indexAction(Request $request)
    {
        $this->searchForm->handleRequest($request);
        $res = "";
        if ($this->searchForm->isValid()) {
            $qiita = new QiitaApi("c1a8ba8b8e2c3f1f36d0b6d620fb8ab977aa9668");
            $memcache = new MemcacheProvider($this->get('memcache.default'));
            $qiita->setCacheProvider($memcache);
            $res = $qiita->request('https://qiita.com/api/v2/tags?page=1&per_page=100');
            print_r($res);
            die();
        }
        return array("res" => $res, 'searchForm' => $this->searchForm->createView());
    }

}