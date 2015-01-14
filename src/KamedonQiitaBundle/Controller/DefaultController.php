<?php

namespace KamedonQiitaBundle\Controller;

use Doctrine\Common\Cache\ArrayCache;
use KamedonQiitaBundle\Api\Qiita\QiitaApi;
use KamedonQiitaBundle\Cache\MemcacheProvider;
use KamedonQiitaBundle\Entity\Qiita\QiitaSearch;
use KamedonQiitaBundle\Form\QiitaSearchForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/")
 */
class DefaultController extends AbstractController
{
    /**
     * @Route("/",name="top")
     * @Template()
     */
    public function indexAction()
    {
        return array('searchForm' => $this->searchForm->createView());
    }
}
