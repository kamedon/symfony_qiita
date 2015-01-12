<?php
/**
 * Created by IntelliJ IDEA.
 * User: kamedon
 * Date: 15/01/12
 * Time: 21:37
 */

namespace KamedonQiitaBundle\Controller;

use KamedonQiitaBundle\Entity\Qiita\QiitaSearch;
use KamedonQiitaBundle\Form\QiitaSearchForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\HttpFoundation\Request;

abstract class AbstractController extends Controller
{
    /** @var \Symfony\Component\Form\Form */
    protected $searchForm;

    public function before(Request $request)
    {
        $this->searchForm = $this->createSearchForm();
    }

    /**
     * @return \Symfony\Component\Form\Form
     */
    public function createSearchForm()
    {
        return $this->createForm(new QiitaSearchForm(), new QiitaSearch(), [
            'action' => $this->generateUrl('qiita_search'),
            'method' => 'get',
        ]);
    }


}