<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;
use DateTime;
/**
 *@ApiResource(
 *   collectionOperations={
 *     "get"={},
 *     "post"={},
 *
 *     },
 *     itemOperations={
 *      "get"={},
 *      "payment"={
 *        "method"="POST",
 *        "path"="/reservations/{id}/payment",
 *        "controller"="App\Controller\MangoUserController::payment"
 *     },
 *     "get_card"={
 *        "method"="GET",
 *        "path"="/reservations/{id}/{cardId}/card",
 *        "controller"="App\Controller\MangoUserController::getCardById"
 *     },
 *     "get_transaction"={
 *        "method"="GET",
 *        "path"="/reservations/{id}/{transactionId}/transaction",
 *        "description"= "get transaction details",
 *        "controller"="App\Controller\MangoUserController::getPayInById"
 *     },
 *
 *     "put"={},
 *     "delete"={},
 *   }
 * )
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
     * @ORM\Column(type="string", nullable=true)
     */
    private $dateReservation;

    /**
     * @ORM\Column(type="string", nullable=true)
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

     /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $nombreChamber;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $nombreAdulte;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $nombreEnfant;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $checkIn;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $checkOut;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $transactionId;

    /**
     * @ORM\ManyToOne(targetEntity=ServiceDesMonuments::class, inversedBy="reservations")
     */
    private $serviceDesMonuments;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $codeReservation;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $status;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $montantPaiment;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nbrPersonnes;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nbrTables;



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

    public function getDateReservation(): ?string
    {
        return $this->dateReservation;
    }

    public function setDateReservation(?string $dateReservation): self
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

    public function getNombreChamber(): ?string
    {
        return $this->nombreChamber;
    }

    public function setNombreChamber(?string $nombreChamber): self
    {
        $this->nombreChamber = $nombreChamber;

        return $this;
    }

    public function getNombreAdulte(): ?string
    {
        return $this->nombreAdulte;
    }

    public function setNombreAdulte(?string $nombreAdulte): self
    {
        $this->nombreAdulte = $nombreAdulte;

        return $this;
    }

    public function getNombreEnfant(): ?string
    {
        return $this->nombreEnfant;
    }

    public function setNombreEnfant(?string $nombreEnfant): self
    {
        $this->nombreEnfant = $nombreEnfant;

        return $this;
    }

    public function getCheckIn(): ?string
    {
        return $this->checkIn;
    }

    public function setCheckIn(?string $checkIn): self
    {
        $this->checkIn = $checkIn;

        return $this;
    }

    public function getCheckOut(): ?string
    {
        return $this->checkOut;
    }

    public function setCheckOut(?string $checkOut): self
    {
        $this->checkOut = $checkOut;

        return $this;
    }

    public function getTransactionId(): ?string
    {
        return $this->transactionId;
    }

    public function setTransactionId(?string $transactionId): self
    {
        $this->transactionId = $transactionId;

        return $this;
    }

    public function getServiceDesMonuments(): ?ServiceDesMonuments
    {
        return $this->serviceDesMonuments;
    }

    public function setServiceDesMonuments(?ServiceDesMonuments $serviceDesMonuments): self
    {
        $this->serviceDesMonuments = $serviceDesMonuments;

        return $this;
    }
    public function __toString() {
        return (string)$this->id;
    }

    public function getCodeReservation(): ?string
    {
        return $this->codeReservation;
    }

    public function setCodeReservation(?string $codeReservation): self
    {
        $this->codeReservation = $codeReservation;

        return $this;
    }

    public function getStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(?bool $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getMontantPaiment(): ?float
    {
        return $this->montantPaiment;
    }

    public function setMontantPaiment(?float $montantPaiment): self
    {
        $this->montantPaiment = $montantPaiment;

        return $this;
    }

    public function getNbrPersonnes(): ?string
    {
        return $this->nbrPersonnes;
    }

    public function setNbrPersonnes(?string $nbrPersonnes): self
    {
        $this->nbrPersonnes = $nbrPersonnes;

        return $this;
    }

    public function getNbrTables(): ?string
    {
        return $this->nbrTables;
    }

    public function setNbrTables(?string $nbrTables): self
    {
        $this->nbrTables = $nbrTables;

        return $this;
    }

}
