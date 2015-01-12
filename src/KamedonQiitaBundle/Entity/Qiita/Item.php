<?php

namespace KamedonQiitaBundle\Entity\Qiita;

use Doctrine\ORM\Mapping as ORM;

/**
 * Item
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="KamedonQiitaBundle\Entity\Qiita\ItemRepository")
 */
class Item
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
     * @ORM\Column(name="body", type="text")
     */
    private $body;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="post_created_at", type="datetime")
     */
    private $postCreatedAt;

    /**
     * @var string
     *
     * @ORM\Column(name="item_id", type="string", length=32)
     */
    private $itemId;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="post_updated_at", type="datetime")
     */
    private $postUpdatedAt;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;


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
     * Set body
     * @codeCoverageIgnore
     *
     * @param string $body
     * @return Item
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body
     * @codeCoverageIgnore
     *
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set postCreatedAt
     * @codeCoverageIgnore
     *
     * @param \DateTime $postCreatedAt
     * @return Item
     */
    public function setPostCreatedAt($postCreatedAt)
    {
        $this->postCreatedAt = $postCreatedAt;

        return $this;
    }

    /**
     * Get postCreatedAt
     * @codeCoverageIgnore
     *
     * @return \DateTime
     */
    public function getPostCreatedAt()
    {
        return $this->postCreatedAt;
    }

    /**
     * Set itemId
     * @codeCoverageIgnore
     *
     * @param string $itemId
     * @return Item
     */
    public function setItemId($itemId)
    {
        $this->itemId = $itemId;

        return $this;
    }

    /**
     * Get itemId
     * @codeCoverageIgnore
     *
     * @return string
     */
    public function getItemId()
    {
        return $this->itemId;
    }

    /**
     * Set title
     * @codeCoverageIgnore
     *
     * @param string $title
     * @return Item
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     * @codeCoverageIgnore
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set postUpdatedAt
     * @codeCoverageIgnore
     *
     * @param \DateTime $postUpdatedAt
     * @return Item
     */
    public function setPostUpdatedAt($postUpdatedAt)
    {
        $this->postUpdatedAt = $postUpdatedAt;

        return $this;
    }

    /**
     * Get postUpdatedAt
     * @codeCoverageIgnore
     *
     * @return \DateTime
     */
    public function getPostUpdatedAt()
    {
        return $this->postUpdatedAt;
    }

    /**
     * Set url
     * @codeCoverageIgnore
     *
     * @param string $url
     * @return Item
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     * @codeCoverageIgnore
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }
}
