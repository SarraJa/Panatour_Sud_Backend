<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ServiceDesMonumentsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use DateTime;


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
 *        "path"="/servicesdesmonuments/{id}/wallet",
 *        "description"= "get transaction details",
 *        "controller"="App\Controller\MangoUserController::createWallet"
 *     },
 *
 *     "put"={},
 *     "delete"={},
 *   }
 * )
 * @ORM\Entity(repositoryClass=ServiceDesMonumentsRepository::class)
 */
class ServiceDesMonuments
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
    private $epoque;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $libele;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity=LieuInteret::class, inversedBy="ServiceDesMonuments")
     */
    private $lieuInteret;

    /**
     * @ORM\OneToMany(targetEntity=Image::class, mappedBy="serviceDesMonuments",cascade={"persist","remove"})
     */
    private $images;

    /**
     * @ORM\OneToMany(targetEntity=Reservation::class, mappedBy="serviceDesMonuments")
     */
    private $reservations;



    public function __construct()
    {
        $this->reservation = new ArrayCollection();
        $this->image = new ArrayCollection();
        $this->images = new ArrayCollection();
        $this->reservations = new ArrayCollection();
        if ($this->getCreatedAt() === null) {
            $this->setCreatedAt(new DateTime('now'));
        }
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEpoque(): ?string
    {
        return $this->epoque;
    }

    public function setEpoque(?string $epoque): self
    {
        $this->epoque = $epoque;

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

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

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

    public function addImage(Image $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setServiceDesMonuments($this);
        }

        return $this;
    }

    public function removeImage(Image $image): self
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getServiceDesMonuments() === $this) {
                $image->setServiceDesMonuments(null);
            }
        }

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
            $reservation->setServiceDesMonuments($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): self
    {
        if ($this->reservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getServiceDesMonuments() === $this) {
                $reservation->setServiceDesMonuments(null);
            }
        }

        return $this;
    }









}
