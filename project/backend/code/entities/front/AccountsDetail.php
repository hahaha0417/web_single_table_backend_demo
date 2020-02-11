<?php

namespace entities\front;

use Doctrine\ORM\Mapping as ORM;

/**
 * AccountsDetail
 *
 * @ORM\Table(name="accounts_detail", indexes={@ORM\Index(name="accounts_detail_accounts_id_foreign", columns={"accounts_id"})})
 * @ORM\Entity(repositoryClass="repositories\front\AccountsDetail")
 */
class AccountsDetail
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
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true, options={"comment"="名稱"})
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nickname", type="string", length=255, nullable=true, options={"comment"="暱稱"})
     */
    private $nickname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="avatar", type="string", length=512, nullable=true, options={"comment"="頭像"})
     */
    private $avatar;

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
     * @var string|null
     *
     * @ORM\Column(name="phone", type="string", length=255, nullable=true, options={"comment"="電話"})
     */
    private $phone;

    /**
     * @var string|null
     *
     * @ORM\Column(name="verify_token", type="string", length=255, nullable=true, options={"comment"="驗證碼"})
     */
    private $verifyToken;

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
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name.
     *
     * @param string|null $name
     *
     * @return AccountsDetail
     */
    public function setName($name = null)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set nickname.
     *
     * @param string|null $nickname
     *
     * @return AccountsDetail
     */
    public function setNickname($nickname = null)
    {
        $this->nickname = $nickname;

        return $this;
    }

    /**
     * Get nickname.
     *
     * @return string|null
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * Set avatar.
     *
     * @param string|null $avatar
     *
     * @return AccountsDetail
     */
    public function setAvatar($avatar = null)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get avatar.
     *
     * @return string|null
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Set image.
     *
     * @param string|null $image
     *
     * @return AccountsDetail
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
     * @return AccountsDetail
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
     * Set phone.
     *
     * @param string|null $phone
     *
     * @return AccountsDetail
     */
    public function setPhone($phone = null)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone.
     *
     * @return string|null
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set verifyToken.
     *
     * @param string|null $verifyToken
     *
     * @return AccountsDetail
     */
    public function setVerifyToken($verifyToken = null)
    {
        $this->verifyToken = $verifyToken;

        return $this;
    }

    /**
     * Get verifyToken.
     *
     * @return string|null
     */
    public function getVerifyToken()
    {
        return $this->verifyToken;
    }

    /**
     * Set createdAt.
     *
     * @param \DateTime|null $createdAt
     *
     * @return AccountsDetail
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
     * @return AccountsDetail
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
     * @return AccountsDetail
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
}
