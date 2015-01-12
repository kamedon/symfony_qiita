<?php
/**
 * Created by IntelliJ IDEA.
 * User: kamedon
 * Date: 15/01/12
 * Time: 20:30
 */

namespace KamedonQiitaBundle\Entity\Qiita;

use Symfony\Component\Validator\Constraints as Assert;


class QiitaSearch
{
    /**
     * @var  string
     * @Assert\NotBlank()
     */
    private $q;

    /**
     * @var  string
     * @Assert\Choice(choices = {"item", "tag"}, message = "Choose a valid .")
     */
    private $category;

    /**
     * @return string
     */
    public function getQ()
    {
        return $this->q;
    }

    /**
     * @param string $q
     */
    public function setQ($q)
    {
        $this->q = $q;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

}