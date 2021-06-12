<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ReservationRepository::class)
 */
class Reservation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateReservation;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $duree;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="reservation")
     */
    private $client;

    /**
     * @ORM\OneToOne(targetEntity=Facture::class, mappedBy="reservation", cascade={"persist", "remove"})
     */
    private $facture;

    /**
     * @ORM\ManyToOne(targetEntity=ServiceTransport::class, inversedBy="reservations")
     */
    private $serviceTransport;

    /**
     * @ORM\ManyToOne(targetEntity=ServiceHotelier::class, inversedBy="reservations")
     */
    private $serviceHotelier;

    /**
     * @ORM\ManyToOne(targetEntity=ServiceRestauration::class, inversedBy="reservations")
     */
    private $serviceRestauration;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateReservation(): ?\DateTimeInterface
    {
        return $this->dateReservation;
    }

    public function setDateReservation(?\DateTimeInterface $dateReservation): self
    {
        $this->dateReservation = $dateReservation;

        return $this;
    }

    public function getDuree(): ?int
    {
        return $this->duree;
    }

    public function setDuree(?int $duree): self
    {
        $this->duree = $duree;

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

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getFacture(): ?Facture
    {
        return $this->facture;
    }

    public function setFacture(?Facture $facture): self
    {
        // unset the owning side of the relation if necessary
        if ($facture === null && $this->facture !== null) {
            $this->facture->setReservation(null);
        }

        // set the owning side of the relation if necessary
        if ($facture !== null && $facture->getReservation() !== $this) {
            $facture->setReservation($this);
        }

        $this->facture = $facture;

        return $this;
    }

    public function getServiceTransport(): ?ServiceTransport
    {
        return $this->serviceTransport;
    }

    public function setServiceTransport(?ServiceTransport $serviceTransport): self
    {
        $this->serviceTransport = $serviceTransport;

        return $this;
    }

    public function getServiceHotelier(): ?ServiceHotelier
    {
        return $this->serviceHotelier;
    }

    public function setServiceHotelier(?ServiceHotelier $serviceHotelier): self
    {
        $this->serviceHotelier = $serviceHotelier;

        return $this;
    }

    public function getServiceRestauration(): ?ServiceRestauration
    {
        return $this->serviceRestauration;
    }

    public function setServiceRestauration(?ServiceRestauration $serviceRestauration): self
    {
        $this->serviceRestauration = $serviceRestauration;

        return $this;
    }
}
