<?php
/**
 * Created by IntelliJ IDEA.
 * User: kamedon
 * Date: 15/01/12
 * Time: 20:35
 */
namespace KamedonQiitaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\FormBuilderInterface;

class QiitaSearchForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('q', null, array('label' => 'q'))
            ->add('category', 'choice', [
                'choices' => ['item' => '投稿', 'tag' => 'タグ'],
                'label' => 'タグ'
            ])
            ->add('submit', 'submit');
    }


    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'search_qiita';
    }
}