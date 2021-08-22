<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ServiceHotelierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use DateTime;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;


/**
 * @ApiResource(
 *   collectionOperations={
 *     "get"={},
 *
 *     "createservice"={
 *        "method"="POST",
 *        "path"="/service_hoteliers",
 *        "description"= "new service",
 *        "controller"="App\Controller\ServiceHotelierController::add"
 *     },
 *
 *
 *     },
 *     itemOperations={
 *      "get"={},
 *     "createWallet"={
 *        "method"="POST",
 *        "path"="/service_hoteliers/{id}/wallet",
 *        "description"= "get transaction details",
 *        "controller"="App\Controller\MangoUserController::createWalletHotel"
 *     },
 *
 *     "put"={},
 *     "delete"={},
 *   }
 * )
 * @ORM\Entity(repositoryClass=ServiceHotelierRepository::class)
 * @Vich\Uploadable
 * @ApiFilter(SearchFilter::class, properties={ "lieuInteret": "partial","type": "partial","adresse": "partial","latitude": "exact","longitude": "exact","adresse": "exact"})
 */
class ServiceHotelier
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
    private $libele;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $prix;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @ORM\OneToMany(targetEntity=Reservation::class, mappedBy="serviceHotelier")
     */
    private $reservations;

    /**
     * @ORM\OneToMany(targetEntity=Image::class, mappedBy="ServiceHotelier",cascade={"persist","remove"})
     */
    public $images;

    /**
     * @ORM\ManyToOne(targetEntity=LieuInteret::class, inversedBy="ServiceHotelier")
     */
    private $lieuInteret;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $walletId;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    private $latitude;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $longitude;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $etoiles;





    // /**
    //  * @ORM\Column(type="integer", nullable=true)
    //  */
    // private $nombreChamber;

    // /**
    //  * @ORM\Column(type="integer", nullable=true)
    //  */
    // private $nombreAdulte;

    // /**
    //  * @ORM\Column(type="integer", nullable=true)
    //  */
    // private $nombreEnfant;

    // /**
    //  * @ORM\Column(type="datetime", nullable=true)
    //  */
    // private $checkIn;

    // /**
    //  * @ORM\Column(type="datetime", nullable=true)
    //  */
    // private $checkOut;

    public function __construct()
    {
        $this->reservations = new ArrayCollection();
        $this->images = new ArrayCollection();
        
            
            if ($this->getCreatedAt() === null) {
                $this->setCreatedAt(new DateTime('now'));
            }
            $this->images = new ArrayCollection();
            $this->clients = new ArrayCollection();
      
    
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibele(): ?string
    {
        return $this->libele;
    }

    public function setLibele(?string $libele): self
    {
        $this->libele = $libele;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(?string $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return Collection|Reservation[]
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Reservation $reservation): self
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations[] = $reservation;
            $reservation->setServiceHotelier($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): self
    {
        if ($this->reservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getServiceHotelier() === $this) {
                $reservation->setServiceHotelier(null);
            }
        }

        return $this;
    }
    public function __toString() {
        return (string)$this->libele;
    }

    /**
     * @return Collection|Image[]
     */
    public function getImages(): Collection
    {
        return $this->images;
    }
    
     /**
     * @param ArrayCollection $images
     */
    public function setImages(ArrayCollection $images): void
    {
        $this->images = $images;
    }

    public function addImage(Image $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setServiceHotelier($this);
        }

        return $this;
    }

    public function removeImage(Image $image): self
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getServiceHotelier() === $this) {
                $image->setServiceHotelier(null);
            }
        }

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

    // public function getNombreChamber(): ?int
    // {
    //     return $this->nombreChamber;
    // }

    // public function setNombreChamber(?int $nombreChamber): self
    // {
    //     $this->nombreChamber = $nombreChamber;

    //     return $this;
    // }

    // public function getNombreAdulte(): ?int
    // {
    //     return $this->nombreAdulte;
    // }

    // public function setNombreAdulte(?int $nombreAdulte): self
    // {
    //     $this->nombreAdulte = $nombreAdulte;

    //     return $this;
    // }

    // public function getNombreEnfant(): ?int
    // {
    //     return $this->nombreEnfant;
    // }

    // public function setNombreEnfant(?int $nombreEnfant): self
    // {
    //     $this->nombreEnfant = $nombreEnfant;

    //     return $this;
    // }

    // public function getCheckIn(): ?\DateTimeInterface
    // {
    //     return $this->checkIn;
    // }

    // public function setCheckIn(?\DateTimeInterface $checkIn): self
    // {
    //     $this->checkIn = $checkIn;

    //     return $this;
    // }

    // public function getCheckOut(): ?\DateTimeInterface
    // {
    //     return $this->checkOut;
    // }

    // public function setCheckOut(?\DateTimeInterface $checkOut): self
    // {
    //     $this->checkOut = $checkOut;

    //     return $this;
    // }

    public function getWalletId(): ?string
    {
        return $this->walletId;
    }

    public function setWalletId(?string $walletId): self
    {
        $this->walletId = $walletId;

        return $this;
    }

    public function getLatitude(): ?string
    {
        return $this->latitude;
    }

    public function setLatitude(?string $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?string
    {
        return $this->longitude;
    }

    public function setLongitude(?string $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getEtoiles(): ?string
    {
        return $this->etoiles;
    }

    public function setEtoiles(?string $etoiles): self
    {
        $this->etoiles = $etoiles;

        return $this;
    }











   
}
