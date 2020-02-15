<?php

namespace entities\front;

use Doctrine\ORM\Mapping as ORM;

/**
 * Products
 *
 * @ORM\Table(name="products")
 * @ORM\Entity(repositoryClass="repositories\front\Products")
 */
class Products
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="bigint", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=false, options={"comment"="類型"})
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false, options={"comment"="名稱"})
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=1024, nullable=true, options={"comment"="描述"})
     */
    private $description;

    /**
     * @var string|null
     *
     * @ORM\Column(name="comment", type="string", length=1024, nullable=true, options={"comment"="備註"})
     */
    private $comment;

    /**
     * @var string|null
     *
     * @ORM\Column(name="image", type="string", length=512, nullable=true, options={"comment"="圖片"})
     */
    private $image;

    /**
     * @var string|null
     *
     * @ORM\Column(name="url", type="string", length=512, nullable=true, options={"comment"="連結"})
     */
    private $url;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="show_start_time", type="datetime", nullable=true, options={"comment"="顯示開始時間"})
     */
    private $showStartTime;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="show_end_time", type="datetime", nullable=true, options={"comment"="顯示結束時間"})
     */
    private $showEndTime;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="sale_start_time", type="datetime", nullable=true, options={"comment"="販賣開始時間"})
     */
    private $saleStartTime;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="sale_end_time", type="datetime", nullable=true, options={"comment"="販賣結束時間"})
     */
    private $saleEndTime;

    /**
     * @var int
     *
     * @ORM\Column(name="status", type="integer", nullable=false, options={"comment"="狀態 -1 停用 0 正常"})
     */
    private $status;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;



    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set type.
     *
     * @param string $type
     *
     * @return Products
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return Products
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description.
     *
     * @param string|null $description
     *
     * @return Products
     */
    public function setDescription($description = null)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description.
     *
     * @return string|null
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set comment.
     *
     * @param string|null $comment
     *
     * @return Products
     */
    public function setComment($comment = null)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment.
     *
     * @return string|null
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set image.
     *
     * @param string|null $image
     *
     * @return Products
     */
    public function setImage($image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image.
     *
     * @return string|null
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set url.
     *
     * @param string|null $url
     *
     * @return Products
     */
    public function setUrl($url = null)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url.
     *
     * @return string|null
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set showStartTime.
     *
     * @param \DateTime|null $showStartTime
     *
     * @return Products
     */
    public function setShowStartTime($showStartTime = null)
    {
        $this->showStartTime = $showStartTime;

        return $this;
    }

    /**
     * Get showStartTime.
     *
     * @return \DateTime|null
     */
    public function getShowStartTime()
    {
        return $this->showStartTime;
    }

    /**
     * Set showEndTime.
     *
     * @param \DateTime|null $showEndTime
     *
     * @return Products
     */
    public function setShowEndTime($showEndTime = null)
    {
        $this->showEndTime = $showEndTime;

        return $this;
    }

    /**
     * Get showEndTime.
     *
     * @return \DateTime|null
     */
    public function getShowEndTime()
    {
        return $this->showEndTime;
    }

    /**
     * Set saleStartTime.
     *
     * @param \DateTime|null $saleStartTime
     *
     * @return Products
     */
    public function setSaleStartTime($saleStartTime = null)
    {
        $this->saleStartTime = $saleStartTime;

        return $this;
    }

    /**
     * Get saleStartTime.
     *
     * @return \DateTime|null
     */
    public function getSaleStartTime()
    {
        return $this->saleStartTime;
    }

    /**
     * Set saleEndTime.
     *
     * @param \DateTime|null $saleEndTime
     *
     * @return Products
     */
    public function setSaleEndTime($saleEndTime = null)
    {
        $this->saleEndTime = $saleEndTime;

        return $this;
    }

    /**
     * Get saleEndTime.
     *
     * @return \DateTime|null
     */
    public function getSaleEndTime()
    {
        return $this->saleEndTime;
    }

    /**
     * Set status.
     *
     * @param string $status
     *
     * @return Products
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set createdAt.
     *
     * @param \DateTime|null $createdAt
     *
     * @return Products
     */
    public function setCreatedAt($createdAt = null)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt.
     *
     * @return \DateTime|null
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt.
     *
     * @param \DateTime|null $updatedAt
     *
     * @return Products
     */
    public function setUpdatedAt($updatedAt = null)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt.
     *
     * @return \DateTime|null
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}
