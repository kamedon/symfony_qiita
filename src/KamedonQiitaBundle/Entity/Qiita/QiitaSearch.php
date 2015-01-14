<?php
/**
 * Created by IntelliJ IDEA.
 * User: kamedon
 * Date: 15/01/12
 * Time: 20:30
 */

namespace KamedonQiitaBundle\Entity\Qiita;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Exception\InvalidOptionsException;


class QiitaSearch
{
    const CATEGORY_ITEM = "item";
    const CATEGORY_TAG = "tag";

    /** @var int */
    private $page = 1;

    /** @var int */
    private $perCount = 100;

    private $apiBaseUrl = "https://qiita.com/api/v2";

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

    private function createParams()
    {
        $params = [
            'query' => $this->q,
            'sort' => 'stock',
            'page' => $this->page,
            'per_page' => $this->perCount,
        ];
        return $params;
    }

    /**
     * @return string
     */
    public function buildQuery()
    {
        if (self::CATEGORY_ITEM === $this->category) {
            return $this->apiBaseUrl . '/items?' . http_build_query($this->createParams());
        } elseif (self::CATEGORY_TAG === $this->category) {
            return 'https://qiita.com/api/v2ttps://qiita.com/api/v2/tags?page=1&per_page=100';
        } else {
            throw new \InvalidArgumentException();
        }
    }

}