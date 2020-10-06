<?php

namespace entities\backend;

use Doctrine\ORM\Mapping as ORM;

/**
 * AccountsRelations
 *
 * @ORM\Table(name="accounts_relations", indexes={@ORM\Index(name="accounts_relations_accounts_id2_foreign", columns={"accounts_id2"}), @ORM\Index(name="accounts_relations_accounts_id1_accounts_id2_index", columns={"accounts_id1", "accounts_id2"}), @ORM\Index(name="IDX_29EDF1D12DC1DB71", columns={"accounts_id1"})})
 * @ORM\Entity(repositoryClass="repositories\backend\AccountsRelations")
 */
class AccountsRelations
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
     * @ORM\Column(name="description", type="string", length=255, nullable=true, options={"comment"="description"})
     */
    private $description;

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
     * @var \entities\backend\Accounts
     *
     * @ORM\ManyToOne(targetEntity="entities\backend\Accounts")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="accounts_id1", referencedColumnName="id")
     * })
     */
    private $accountsId1;

    /**
     * @var \entities\backend\Accounts
     *
     * @ORM\ManyToOne(targetEntity="entities\backend\Accounts")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="accounts_id2", referencedColumnName="id")
     * })
     */
    private $accountsId2;



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
     * Set description.
     *
     * @param string|null $description
     *
     * @return AccountsRelations
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
     * Set createdAt.
     *
     * @param \DateTime|null $createdAt
     *
     * @return AccountsRelations
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
     * @return AccountsRelations
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
     * Set accountsId1.
     *
     * @param \entities\backend\Accounts|null $accountsId1
     *
     * @return AccountsRelations
     */
    public function setAccountsId1(\entities\backend\Accounts $accountsId1 = null)
    {
        $this->accountsId1 = $accountsId1;

        return $this;
    }

    /**
     * Get accountsId1.
     *
     * @return \entities\backend\Accounts|null
     */
    public function getAccountsId1()
    {
        return $this->accountsId1;
    }

    /**
     * Set accountsId2.
     *
     * @param \entities\backend\Accounts|null $accountsId2
     *
     * @return AccountsRelations
     */
    public function setAccountsId2(\entities\backend\Accounts $accountsId2 = null)
    {
        $this->accountsId2 = $accountsId2;

        return $this;
    }

    /**
     * Get accountsId2.
     *
     * @return \entities\backend\Accounts|null
     */
    public function getAccountsId2()
    {
        return $this->accountsId2;
    }
}
