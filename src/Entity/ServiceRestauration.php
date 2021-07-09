<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ServiceRestaurationRepository;
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
 *     "post"={},
 *
 *     },
 *     itemOperations={
 *      "get"={},
 *     "createWallet"={
 *        "method"="POST",
 *        "path"="/servicerestauration/{id}/wallet",
 *        "description"= "get transaction details",
 *        "controller"="App\Controller\MangoUserController::createWallet"
 *     },
 *
 *     "put"={},
 *     "delete"={},
 *   }
 * )
 * @ORM\Entity(repositoryClass=ServiceRestaurationRepository::class)
 * @Vich\Uploadable
 * @ApiFilter(SearchFilter::class, properties={ "adresse": "partial"})
 * @ApiFilter(SearchFilter::class, properties={ "type": "partial"})
 */
class ServiceRestauration
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
    private $prix;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @ORM\OneToMany(targetEntity=Reservation::class, mappedBy="serviceRestauration")
     */
    private $reservations;

    /**
     * @ORM\ManyToOne(targetEntity=LieuInteret::class, inversedBy="ServiceRestauration")
     */
    private $lieuInteret;

    /**
     * @ORM\OneToMany(targetEntity=Image::class, mappedBy="ServiceRestauration",cascade={"persist","remove"})
     */
    public $images;

    public function __construct()
    {
        $this->reservations = new ArrayCollection();
        $this->images = new ArrayCollection();
      
            
            if ($this->getCreatedAt() === null) {
                $this->setCreatedAt(new DateTime('now'));
            }
            $this->images = new ArrayCollection();
        
    
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
            $reservation->setServiceRestauration($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): self
    {
        if ($this->reservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getServiceRestauration() === $this) {
                $reservation->setServiceRestauration(null);
            }
        }

        return $this;
    }
    public function __toString() {
        return $this->libele;
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
            $image->setServiceRestauration($this);
        }

        return $this;
    }


    public function removeImage(Image $image): self
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getServiceRestauration() === $this) {
                $image->setServiceRestauration(null);
            }
        }

        return $this;
    }


   
    
}

