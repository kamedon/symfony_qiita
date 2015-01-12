<?php

namespace KamedonQiitaBundle\Entity\Qiita;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="KamedonQiitaBundle\Entity\Qiita\UserRepository")
 */
class User
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="image_url", type="string", length=255)
     */
    private $imageUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="account_id", type="string", length=255)
     */
    private $accountId;


    /**
     * Get id
     * @codeCoverageIgnore
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     * @codeCoverageIgnore
     *
     * @param string $name
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     * @codeCoverageIgnore
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set imageUrl
     * @codeCoverageIgnore
     *
     * @param string $imageUrl
     * @return User
     */
    public function setImageUrl($imageUrl)
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    /**
     * Get imageUrl
     * @codeCoverageIgnore
     *
     * @return string
     */
    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    /**
     * Set description
     * @codeCoverageIgnore
     *
     * @param string $description
     * @return User
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     * @codeCoverageIgnore
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set accountId
     * @codeCoverageIgnore
     *
     * @param string $accountId
     * @return User
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;

        return $this;
    }

    /**
     * Get accountId
     * @codeCoverageIgnore
     *
     * @return string
     */
    public function getAccountId()
    {
        return $this->accountId;
    }
}
