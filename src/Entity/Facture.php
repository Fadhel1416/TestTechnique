<?php

namespace App\Entity;

use App\Repository\FactureRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FactureRepository::class)
 */
class Facture
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $designation;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2)
     */
    private $PrixHt;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=8)
     */
    private $PrixTtc;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(string $designation): self
    {
        $this->designation = $designation;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrixHt(): ?string
    {
        return $this->PrixHt;
    }

    public function setPrixHt(string $PrixHt): self
    {
        $this->PrixHt = $PrixHt;

        return $this;
    }

    public function getPrixTtc(): ?string
    {
        return $this->PrixTtc;
    }

    public function setPrixTtc(string $PrixTtc): self
    {
        $this->PrixTtc = $PrixTtc;

        return $this;
    }
}
