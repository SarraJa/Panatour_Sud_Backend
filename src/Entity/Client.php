<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;


use DateTime;

/**
 *@ApiResource(
 *
 *   collectionOperations={
 *     "get"={},
 *     "post"={},
 *
 *     },
 *     itemOperations={
 *      "get"={},
 *      "post_card"={
 *        "method"="POST",
 *        "path"="/clients/{id}/{mangopayid}/card",
 *        "input_formats"={"json"={"application/json"}},
 *       "swagger_context"={
              "summary" = "post card",
              "description" = "post card",
 *         },
 *        "controller"="App\Controller\MangoUserController::postCardInfos"
 *     },
 *     "create_user"={
 *        "method"="POST",
 *        "path"="/clients/{id}/client",
 *        "controller"="App\Controller\MangoUserController::CreateUserPayment"
 *     },
 *     "get_cards"={
 *        "method"="GET",
 *        "path"="/clients/{id}/{mangopayid}/cards",
 *        "controller"="App\Controller\MangoUserController::getCards"
 *     },
 *
 *     "put"={},
 *     "delete"={},
 *   }
 * )
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 *

 * )

 */
class Client extends Userd
{
    /**
     * @ORM\Id()
     * @ORM\OneToOne(targetEntity=Userd::class)
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
     * @ORM\Column(type="string", nullable=true)
     */
    public $dateNaissance;

    /**
     * @ORM\Column(type="datetime")
     */
    private $CreatedAt;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $numeroCarte;

    /**
     * @ORM\Column(type="string", nullable=true)
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

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $mangopayid;



    public function __construct()
    {
        //parent::__construct();
        $this->lieuVisite = new ArrayCollection();
        $this->reservation = new ArrayCollection();
        $this->reclamation = new ArrayCollection();
        if ($this->getCreatedAt() === null) {
            $this->setCreatedAt(new DateTime('now'));
        }
        $this->paimentServiceHotelier = new ArrayCollection();
    }

  
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

    public function getDateNaissance(): ?string
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(?string $dateNaissance): self
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

    public function getNumeroCarte(): ?string
    {
        return $this->numeroCarte;
    }

    public function setNumeroCarte(?string $numeroCarte): self
    {
        $this->numeroCarte = $numeroCarte;

        return $this;
    }

    public function getNumeroTelephone(): ?string
    {
        return $this->numeroTelephone;
    }

    public function setNumeroTelephone(?string $numeroTelephone): self
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
    

    public function __toString() {
        return (string)$this->username;
    }

    public function getMangopayid(): ?string
    {
        return $this->mangopayid;
    }

    public function setMangopayid(?string $mangopayid): self
    {
        $this->mangopayid = $mangopayid;

        return $this;
    }

   
}
