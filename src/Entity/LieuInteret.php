<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\LieuInteretRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use DateTime;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=LieuInteretRepository::class)
 */
class LieuInteret
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
    private $gouvernerat;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $latitude;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $longitude;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $score;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @ORM\ManyToMany(targetEntity=Client::class, mappedBy="lieuVisite")
     */
    private $clients;

    /**
     * @ORM\OneToMany(targetEntity=Reclamation::class, mappedBy="lieuInteret")
     */
    private $reclamation;

    /**
     * @ORM\OneToMany(targetEntity=ServiceTransport::class, mappedBy="lieuInteret")
     */
    private $ServiceTransport;

    /**
     * @ORM\OneToMany(targetEntity=ServiceRestauration::class, mappedBy="lieuInteret")
     */
    private $ServiceRestauration;

    /**
     * @ORM\OneToMany(targetEntity=ServiceHotelier::class, mappedBy="lieuInteret")
     */
    private $ServiceHotelier;

    /**
     * @ORM\OneToMany(targetEntity=ServiceDesMonuments::class, mappedBy="lieuInteret")
     */
    private $ServiceDesMonuments;

    public function __construct()
    {
        $this->clients = new ArrayCollection();
        $this->reclamation = new ArrayCollection();
        if ($this->getCreatedAt() === null) {
            $this->setCreatedAt(new DateTime('now'));
        }
        $this->ServiceTransport = new ArrayCollection();
        $this->ServiceRestauration = new ArrayCollection();
        $this->ServiceHotelier = new ArrayCollection();
        $this->ServiceDesMonuments = new ArrayCollection();
    }
    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGouvernerat(): ?string
    {
        return $this->gouvernerat;
    }

    public function setGouvernerat(?string $gouvernerat): self
    {
        $this->gouvernerat = $gouvernerat;

        return $this;
    }

    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    public function setLatitude(?float $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    public function setLongitude(?float $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getScore(): ?int
    {
        return $this->score;
    }

    public function setScore(?int $score): self
    {
        $this->score = $score;

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
     * @return Collection|Client[]
     */
    public function getClients(): Collection
    {
        return $this->clients;
    }

    public function addClient(Client $client): self
    {
        if (!$this->clients->contains($client)) {
            $this->clients[] = $client;
            $client->addLieuVisite($this);
        }

        return $this;
    }

    public function removeClient(Client $client): self
    {
        if ($this->clients->removeElement($client)) {
            $client->removeLieuVisite($this);
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
            $reclamation->setLieuInteret($this);
        }

        return $this;
    }

    public function removeReclamation(Reclamation $reclamation): self
    {
        if ($this->reclamation->removeElement($reclamation)) {
            // set the owning side to null (unless already changed)
            if ($reclamation->getLieuInteret() === $this) {
                $reclamation->setLieuInteret(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ServiceTransport[]
     */
    public function getServiceTransport(): Collection
    {
        return $this->ServiceTransport;
    }

    public function addServiceTransport(ServiceTransport $serviceTransport): self
    {
        if (!$this->ServiceTransport->contains($serviceTransport)) {
            $this->ServiceTransport[] = $serviceTransport;
            $serviceTransport->setLieuInteret($this);
        }

        return $this;
    }

    public function removeServiceTransport(ServiceTransport $serviceTransport): self
    {
        if ($this->ServiceTransport->removeElement($serviceTransport)) {
            // set the owning side to null (unless already changed)
            if ($serviceTransport->getLieuInteret() === $this) {
                $serviceTransport->setLieuInteret(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ServiceRestauration[]
     */
    public function getServiceRestauration(): Collection
    {
        return $this->ServiceRestauration;
    }

    public function addServiceRestauration(ServiceRestauration $serviceRestauration): self
    {
        if (!$this->ServiceRestauration->contains($serviceRestauration)) {
            $this->ServiceRestauration[] = $serviceRestauration;
            $serviceRestauration->setLieuInteret($this);
        }

        return $this;
    }

    public function removeServiceRestauration(ServiceRestauration $serviceRestauration): self
    {
        if ($this->ServiceRestauration->removeElement($serviceRestauration)) {
            // set the owning side to null (unless already changed)
            if ($serviceRestauration->getLieuInteret() === $this) {
                $serviceRestauration->setLieuInteret(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ServiceHotelier[]
     */
    public function getServiceHotelier(): Collection
    {
        return $this->ServiceHotelier;
    }

    public function addServiceHotelier(ServiceHotelier $serviceHotelier): self
    {
        if (!$this->ServiceHotelier->contains($serviceHotelier)) {
            $this->ServiceHotelier[] = $serviceHotelier;
            $serviceHotelier->setLieuInteret($this);
        }

        return $this;
    }

    public function removeServiceHotelier(ServiceHotelier $serviceHotelier): self
    {
        if ($this->ServiceHotelier->removeElement($serviceHotelier)) {
            // set the owning side to null (unless already changed)
            if ($serviceHotelier->getLieuInteret() === $this) {
                $serviceHotelier->setLieuInteret(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ServiceDesMonuments[]
     */
    public function getServiceDesMonuments(): Collection
    {
        return $this->ServiceDesMonuments;
    }

    public function addServiceDesMonument(ServiceDesMonuments $serviceDesMonument): self
    {
        if (!$this->ServiceDesMonuments->contains($serviceDesMonument)) {
            $this->ServiceDesMonuments[] = $serviceDesMonument;
            $serviceDesMonument->setLieuInteret($this);
        }

        return $this;
    }

    public function removeServiceDesMonument(ServiceDesMonuments $serviceDesMonument): self
    {
        if ($this->ServiceDesMonuments->removeElement($serviceDesMonument)) {
            // set the owning side to null (unless already changed)
            if ($serviceDesMonument->getLieuInteret() === $this) {
                $serviceDesMonument->setLieuInteret(null);
            }
        }

        return $this;
    }

    public function __toString() {
        return $this->gouvernerat;
    }
}
