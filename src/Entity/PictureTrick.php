<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PictureTrickRepository")
 */
class PictureTrick
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Trick", inversedBy="pictureTricks", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $relation;

    /**
     * @Assert\Image(
     * mimeTypes= {"image/jpeg", "image/jpg", "image/png"},
     * mimeTypesMessage = "Veuillez selectionner une image en .jpg, .jpeg ou .png",
     * minHeight = 300,
     * minHeightMessage = "La hauteur de l'image est trop petite, minimum 300",
     * minWidth = 300,
     * minWidthMessage = "La largeur de l'image est trop petite, minimum 300",
     * maxSize = "2m",
     * maxSizeMessage = "L'image est trop grosse, kappa!, 2 mo Max !",
     * )
     */
    private $file;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getRelation(): ?Trick
    {
        return $this->relation;
    }

    public function setRelation(?Trick $relation): self
    {
        $this->relation = $relation;

        return $this;
    }

    public function getFile(): ?UploadedFile
    {
        return $this->file;
    }
    public function setFile(UploadedFile $file): self
    {
        $this->file = $file;
        return $this;
    }
}
