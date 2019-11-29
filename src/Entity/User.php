<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity("email")
 */
class User implements UserInterface, \Serializable
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180)
     * @Assert\Length(min=5, 
     * max=25, 
     * minMessage="Le pseudo doit contenir au minimun {{ limit }} caractères",
     * maxMessage="Le pseudo doit contenir moins de {{ limit }} caractères"
     * )
     */
    private $username;

    /**
     * @ORM\Column(type="json")
     */
    private $roles;

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\Length( min=8,    
     * max=255, 
     * minMessage="Le mdp doit contenir au minimun {{ limit }} caractères",
     * maxMessage="Le mdp doit contenir moins de {{ limit }} caractères"
     * )
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Email(
     * message = "Veuillez rentrer une adresse mail valide")
     */
    private $email;
    private $plainPassword;
    private $oldPassword;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\PictureUser", mappedBy="relation", cascade={"persist", "remove"})
     */
    private $pictureUser;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Token", mappedBy="user_id", cascade={"persist", "remove"})
     */
    private $tokens;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Comment", mappedBy="user_id", cascade={"persist", "remove"})
     */
    private $comments;

    public function __construct()
    {
        $this->created_at = new ArrayCollection();
        $this->tokens = new ArrayCollection();
        $this->comments = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function serialize()
    {
        return serialize([
            $this->id,
            $this->username,
            $this->password,
        ]);
    }

    public function unserialize($serialized)
    {
        list(
            $this->id,
            $this->username,
            $this->password,
        ) = unserialize($serialized, ['allowed_classes' => false]);
    }

    public function getPlainPassword(): ?string
    {
        return $this->plainPassword;
    }
    public function setPlainPassword(?string $plainPassword): self
    {
        $this->plainPassword = $plainPassword;
        return $this;
    }

    public function getOldPassword(): ?string
    {
        return $this->oldPassword;
    }
    public function setOldPassword(?string $oldPassword): self
    {
        $this->oldPassword = $oldPassword;
        return $this;
    }

    public function getPictureUser(): ?PictureUser
    {
        return $this->pictureUser;
    }

    public function setPictureUser(?PictureUser $pictureUser): self
    {
        $this->pictureUser = $pictureUser;

        // set (or unset) the owning side of the relation if necessary
        $newRelation = $pictureUser === null ? null : $this;
        if ($newRelation !== $pictureUser->getRelation()) {
            $pictureUser->setRelation($newRelation);
        }

        return $this;
    }

    /**
     * @return Collection|Token[]
     */
    public function getTokens(): Collection
    {
        return $this->tokens;
    }

    public function addToken(Token $token): self
    {
        if (!$this->tokens->contains($token)) {
            $this->tokens[] = $token;
            $token->setUserId($this);
        }

        return $this;
    }

    public function removeToken(Token $token): self
    {
        if ($this->tokens->contains($token)) {
            $this->tokens->removeElement($token);
            // set the owning side to null (unless already changed)
            if ($token->getUserId() === $this) {
                $token->setUserId(null);
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
            $comment->setUserId($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->contains($comment)) {
            $this->comments->removeElement($comment);
            // set the owning side to null (unless already changed)
            if ($comment->getUserId() === $this) {
                $comment->setUserId(null);
            }
        }

        return $this;
    }
}
