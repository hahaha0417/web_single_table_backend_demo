<?php

namespace entities\backend;

use Doctrine\ORM\Mapping as ORM;

/**
 * Migrations
 *
 * @ORM\Table(name="migrations")
 * @ORM\Entity
 */
class Migrations
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="migration", type="string", length=255, nullable=false)
     */
    private $migration;

    /**
     * @var int
     *
     * @ORM\Column(name="batch", type="integer", nullable=false)
     */
    private $batch;



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
     * Set migration.
     *
     * @param string $migration
     *
     * @return Migrations
     */
    public function setMigration($migration)
    {
        $this->migration = $migration;

        return $this;
    }

    /**
     * Get migration.
     *
     * @return string
     */
    public function getMigration()
    {
        return $this->migration;
    }

    /**
     * Set batch.
     *
     * @param int $batch
     *
     * @return Migrations
     */
    public function setBatch($batch)
    {
        $this->batch = $batch;

        return $this;
    }

    /**
     * Get batch.
     *
     * @return int
     */
    public function getBatch()
    {
        return $this->batch;
    }
}
