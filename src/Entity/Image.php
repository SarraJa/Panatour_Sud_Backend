<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ImageRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ImageRepository::class)
 * @Vich\Uploadable
 */
class Image
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="string" ,length=255)
     *
     */
    public $file;

    /**
     * @Assert\NotNull(groups={"media_object_create"})
     * @Assert\File(
     *     maxSize="1000K",
     *     mimeTypes={
     *         "image/jpg", "image/gif", "image/jpeg", "image/png"
     *     }
     * )
     * @Vich\UploadableField(mapping="service_images", fileNameProperty="file")
     *
     * @var File
     */
    public $imageFile;

    /**
     * @ORM\ManyToOne(targetEntity=ServiceHotelier::class, inversedBy="images")
     */
    private $ServiceHotelier;

    /**
     * @ORM\ManyToOne(targetEntity=ServiceRestauration::class, inversedBy="images")
     */
    private $ServiceRestauration;

    /**
     * @ORM\ManyToOne(targetEntity=ServiceTransport::class, inversedBy="images")
     */
    private $ServiceTransport;

    /**
     * @ORM\ManyToOne(targetEntity=ServiceDesMonuments::class, inversedBy="images")
     */
    private $serviceDesMonuments;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $urlDrive;



    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    /* public function setImageFile(File $image = null)
     {
         $this->imageFile = $image;
     }*/
    /**
     * @param null|File $imageFile
     * @return Image
     */
    public function setImageFile(?File $imageFile): Image
    {
        $this->imageFile = $imageFile;

        return $this;
    }
    public function getFile(): ?string
    {
        return $this->file;
    }

    public function setFile(?string $file): self
    {
        $this->file = $file;
        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getServiceHotelier(): ?ServiceHotelier
    {
        return $this->ServiceHotelier;
    }

    public function setServiceHotelier(?ServiceHotelier $ServiceHotelier): self
    {
        $this->ServiceHotelier = $ServiceHotelier;

        return $this;
    }

    public function getServiceRestauration(): ?ServiceRestauration
    {
        return $this->ServiceRestauration;
    }

    public function setServiceRestauration(?ServiceRestauration $ServiceRestauration): self
    {
        $this->ServiceRestauration = $ServiceRestauration;

        return $this;
    }

    public function getServiceTransport(): ?ServiceTransport
    {
        return $this->ServiceTransport;
    }

    public function setServiceTransport(?ServiceTransport $ServiceTransport): self
    {
        $this->ServiceTransport = $ServiceTransport;

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

    public function getUrlDrive(): ?string
    {
        return $this->urlDrive;
    }

   /* public function setUrlDrive(?string $urlDrive): self
    {
        $this->urlDrive = $urlDrive;

        return $this;
    }*/



    


}
