<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TrickRepository")
 * @UniqueEntity("name")
 */
class Trick
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=3, 
     * max=255, 
     * minMessage="Le nom du trick doit contenir au minimun {{ limit }} caractères",
     * maxMessage="Le nom du trick doit contenir moins de {{ limit }} caractères"
     * )
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     * @Assert\Length(min=3,
     * minMessage="La description du trick doit contenir au minimun {{ limit }} caractères"
     * )
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $category;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $modified_at;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PictureTrick", mappedBy="relation", cascade={"persist", "remove"})
     */
    private $pictureTricks;


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
     * allowPortrait = false,
     * allowPortraitMessage = "Les images en portrait ne sont pas autorisées",
     * minRatio = 1.5,
     * )
     */
    private $defaultPicture;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nameDefaultPicture;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\VideoTrick", mappedBy="relation", cascade={"persist", "remove"})
     */
    private $videoTricks;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Comment", mappedBy="trick", cascade={"persist", "remove"})
     */
    private $comments;

    public function __construct()
    {
        $this->created_at = new \DateTime();
        $this->pictureTricks = new ArrayCollection();
        $this->videoTricks = new ArrayCollection();
        $this->comments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        $this->id;
        return $this->id;
    }

    public function setId($id): ?int
    {
        $this->id =$id;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getModifiedAt(): ?\DateTimeInterface
    {
        return $this->modified_at;
    }

    public function setModifiedAt(?\DateTimeInterface $modified_at): self
    {
        $this->modified_at = $modified_at;

        return $this;
    }

    /**
     * @return Collection|PictureTrick[]
     */
    public function getPictureTricks(): Collection
    {
        return $this->pictureTricks;
    }

    public function addPictureTrick(PictureTrick $pictureTrick): self
    {
        if (!$this->pictureTricks->contains($pictureTrick)) {
            $this->pictureTricks[] = $pictureTrick;
            $pictureTrick->setRelation($this);
        }

        return $this;
    }

    public function removePictureTrick(PictureTrick $pictureTrick): self
    {
        if ($this->pictureTricks->contains($pictureTrick)) {
            $this->pictureTricks->removeElement($pictureTrick);
            // set the owning side to null (unless already changed)
            if ($pictureTrick->getRelation() === $this) {
                $pictureTrick->setRelation(null);
            }
        }

        return $this;
    }

    public function getDefaultPicture(): ?UploadedFile
    {
        return $this->defaultPicture;
    }
    public function setDefaultPicture(UploadedFile $defaultPicture): self
    {
        $this->defaultPicture = $defaultPicture;
        return $this;
    }

    public function getNameDefaultPicture(): ?string
    {
        return $this->nameDefaultPicture;
    }

    public function setNameDefaultPicture(string $nameDefaultPicture): self
    {
        $this->nameDefaultPicture = $nameDefaultPicture;

        return $this;
    }

    /**
     * @return Collection|VideoTrick[]
     */
    public function getVideoTricks(): Collection
    {
        return $this->videoTricks;
    }

    public function addVideoTrick(VideoTrick $videoTrick): self
    {
        if (!$this->videoTricks->contains($videoTrick)) {
            $this->videoTricks[] = $videoTrick;
            $videoTrick->setRelation($this);
        }

        return $this;
    }

    public function removeVideoTrick(VideoTrick $videoTrick): self
    {
        if ($this->videoTricks->contains($videoTrick)) {
            $this->videoTricks->removeElement($videoTrick);
            // set the owning side to null (unless already changed)
            if ($videoTrick->getRelation() === $this) {
                $videoTrick->setRelation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Comment[]
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setTrick($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->contains($comment)) {
            $this->comments->removeElement($comment);
            // set the owning side to null (unless already changed)
            if ($comment->getTrick() === $this) {
                $comment->setTrick(null);
            }
        }

        return $this;
    }
}
