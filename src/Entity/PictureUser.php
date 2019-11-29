<?php

namespace App\Entity;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PictureUserRepository")
 */
class PictureUser
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
     * @ORM\OneToOne(targetEntity="App\Entity\User", inversedBy="pictureUser", cascade={"persist"})
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
     * minRatio = 1,
     * minRatioMessage = "L'image doit être carré, un ratio de 1:1",
     * maxRatio = 1,
     * maxRatioMessage = "L'image doit être carré, un ratio de 1:1",
     * maxSize = "2m",
     * maxSizeMessage = "l'image est trop grosse, kappa!, 2 mo Max !",
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

    public function getRelation(): ?User
    {
        return $this->relation;
    }

    public function setRelation(?User $relation): self
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
