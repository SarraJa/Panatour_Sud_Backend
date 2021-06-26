<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ReclamationRepository;
use Doctrine\ORM\Mapping as ORM;
use DateTime;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ReclamationRepository::class)
 */
class Reclamation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sujet;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $typeObjet;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $etat;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="reclamation")
     */
    private $client;

    /**
     * @ORM\ManyToOne(targetEntity=LieuInteret::class, inversedBy="reclamation")
     */
    private $lieuInteret;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $CreatedAt;
    public function __construct( )
    {
        
        if ($this->getCreatedAt() === null) {
            $this->setCreatedAt(new DateTime('now'));
        }
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSujet(): ?string
    {
        return $this->sujet;
    }

    public function setSujet(?string $sujet): self
    {
        $this->sujet = $sujet;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getTypeObjet(): ?string
    {
        return $this->typeObjet;
    }

    public function setTypeObjet(?string $typeObjet): self
    {
        $this->typeObjet = $typeObjet;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getLieuInteret(): ?LieuInteret
    {
        return $this->lieuInteret;
    }

    public function setLieuInteret(?LieuInteret $lieuInteret): self
    {
        $this->lieuInteret = $lieuInteret;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->CreatedAt;
    }

    public function setCreatedAt(?\DateTimeInterface $CreatedAt): self
    {
        $this->CreatedAt = $CreatedAt;

        return $this;
    }
}
