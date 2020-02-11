<?php

namespace entities\front;

use Doctrine\ORM\Mapping as ORM;

/**
 * AccountsProductsLikes
 *
 * @ORM\Table(name="accounts_products_likes", indexes={@ORM\Index(name="accounts_products_likes_products_id_foreign", columns={"products_id"}), @ORM\Index(name="accounts_products_likes_accounts_id_products_id_index", columns={"accounts_id", "products_id"}), @ORM\Index(name="IDX_25705B4DCC5E8CE8", columns={"accounts_id"})})
 * @ORM\Entity(repositoryClass="repositories\front\AccountsProductsLikes")
 */
class AccountsProductsLikes
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
     * @var bool
     *
     * @ORM\Column(name="like", type="boolean", nullable=false, options={"comment"="喜歡 0 不喜歡 1 喜歡"})
     */
    private $like;

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
     * @var \entities\front\Accounts
     *
     * @ORM\ManyToOne(targetEntity="entities\front\Accounts")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="accounts_id", referencedColumnName="id")
     * })
     */
    private $accounts;

    /**
     * @var \entities\front\Products
     *
     * @ORM\ManyToOne(targetEntity="entities\front\Products")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="products_id", referencedColumnName="id")
     * })
     */
    private $products;



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
     * Set like.
     *
     * @param bool $like
     *
     * @return AccountsProductsLikes
     */
    public function setLike($like)
    {
        $this->like = $like;

        return $this;
    }

    /**
     * Get like.
     *
     * @return bool
     */
    public function getLike()
    {
        return $this->like;
    }

    /**
     * Set createdAt.
     *
     * @param \DateTime|null $createdAt
     *
     * @return AccountsProductsLikes
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
     * @return AccountsProductsLikes
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

    /**
     * Set accounts.
     *
     * @param \entities\front\Accounts|null $accounts
     *
     * @return AccountsProductsLikes
     */
    public function setAccounts(\entities\front\Accounts $accounts = null)
    {
        $this->accounts = $accounts;

        return $this;
    }

    /**
     * Get accounts.
     *
     * @return \entities\front\Accounts|null
     */
    public function getAccounts()
    {
        return $this->accounts;
    }

    /**
     * Set products.
     *
     * @param \entities\front\Products|null $products
     *
     * @return AccountsProductsLikes
     */
    public function setProducts(\entities\front\Products $products = null)
    {
        $this->products = $products;

        return $this;
    }

    /**
     * Get products.
     *
     * @return \entities\front\Products|null
     */
    public function getProducts()
    {
        return $this->products;
    }
}
