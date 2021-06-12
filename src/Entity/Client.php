<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ClientRepository::class)

 */
class Client extends User
{
    /**
     * @ORM\Id()
     * @ORM\OneToOne(targetEntity=User::class) 
     * @ORM\JoinColumn(name="id", referencedColumnName="id")     
     */
    public $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenom;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateNaissance;

    /**
     * @ORM\Column(type="datetime")
     */
    private $CreatedAt;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $numeroCarte;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $numeroTelephone;

    /**
     * @ORM\ManyToMany(targetEntity=LieuInteret::class, inversedBy="clients")
     */
    private $lieuVisite;

    /**
     * @ORM\OneToMany(targetEntity=Reservation::class, mappedBy="client")
     */
    private $reservation;

    /**
     * @ORM\OneToMany(targetEntity=Reclamation::class, mappedBy="client")
     */
    private $reclamation;

    public function __construct()
    {
        $this->lieuVisite = new ArrayCollection();
        $this->reservation = new ArrayCollection();
        $this->reclamation = new ArrayCollection();
    }

    // public function onPrePersist()
    // {
    //     $this->CreatedAt = new \DateTime("now");
    // }



    /**  
     * @return mixed   
     */   
     public function getId(): ?int   
      {        
      return $this->id;  
      
      }
    /**   
     * @param mixed $id    
      */  
     public function setId(?int $id): void  
       {    
           $this->id = $id; 
       }
   

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(?\DateTimeInterface $dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->CreatedAt;
    }

    public function setCreatedAt(\DateTimeInterface $CreatedAt): self
    {
        $this->CreatedAt = $CreatedAt;

        return $this;
    }

    public function getNumeroCarte(): ?int
    {
        return $this->numeroCarte;
    }

    public function setNumeroCarte(?int $numeroCarte): self
    {
        $this->numeroCarte = $numeroCarte;

        return $this;
    }

    public function getNumeroTelephone(): ?int
    {
        return $this->numeroTelephone;
    }

    public function setNumeroTelephone(?int $numeroTelephone): self
    {
        $this->numeroTelephone = $numeroTelephone;

        return $this;
    }

    /**
     * @return Collection|LieuInteret[]
     */
    public function getLieuVisite(): Collection
    {
        return $this->lieuVisite;
    }

    public function addLieuVisite(LieuInteret $lieuVisite): self
    {
        if (!$this->lieuVisite->contains($lieuVisite)) {
            $this->lieuVisite[] = $lieuVisite;
        }

        return $this;
    }

    public function removeLieuVisite(LieuInteret $lieuVisite): self
    {
        $this->lieuVisite->removeElement($lieuVisite);

        return $this;
    }

    /**
     * @return Collection|Reservation[]
     */
    public function getReservation(): Collection
    {
        return $this->reservation;
    }

    public function addReservation(Reservation $reservation): self
    {
        if (!$this->reservation->contains($reservation)) {
            $this->reservation[] = $reservation;
            $reservation->setClient($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): self
    {
        if ($this->reservation->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getClient() === $this) {
                $reservation->setClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Reclamation[]
     */
    public function getReclamation(): Collection
    {
        return $this->reclamation;
    }

    public function addReclamation(Reclamation $reclamation): self
    {
        if (!$this->reclamation->contains($reclamation)) {
            $this->reclamation[] = $reclamation;
            $reclamation->setClient($this);
        }

        return $this;
    }

    public function removeReclamation(Reclamation $reclamation): self
    {
        if ($this->reclamation->removeElement($reclamation)) {
            // set the owning side to null (unless already changed)
            if ($reclamation->getClient() === $this) {
                $reclamation->setClient(null);
            }
        }

        return $this;
    }
}
