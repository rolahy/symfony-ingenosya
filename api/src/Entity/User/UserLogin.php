<?php

namespace App\Entity\User;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Controller\User\UserLoginDetailsController;
use App\Repository\User\UserLoginRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: UserLoginRepository::class)]
#[ORM\Table(name: '`user_login`')]
#[ApiResource(
    collectionOperations: [],
    itemOperations: [
        'get',
        'login_details' => [
            'method' => Request::METHOD_GET,
            'path' => '/users/{uuid}',
            'normalization_context' => [
                'groups' => ['users_login_details'],
            ],
            'controller' => UserLoginDetailsController::class,
        ],
    ],
)]
class UserLogin
{
    #[ORM\Id]
    #[ORM\Column(type: 'uuid', unique: true, nullable: true)]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    #[ApiProperty(identifier: false)]
    private Uuid $id;

    #[ORM\Column(type: 'uuid')]
    #[ApiProperty(identifier: true)]
    #[Groups(['users_list', 'users_login_details'])]
    private Uuid $uuid;

    #[ORM\Column(type: 'string', length: 150)]
    #[Groups(['users_login_details'])]
    private $username;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['users_login_details'])]
    private $password;

    #[ORM\Column(type: 'string', length: 255)]
    private $salt;

    #[ORM\Column(type: 'string', length: 255)]
    private $md5;

    #[ORM\Column(type: 'string', length: 255)]
    private $sha1;

    #[ORM\Column(type: 'string', length: 255)]
    private $sha256;

    #[ORM\OneToOne(mappedBy: 'login', targetEntity: User::class, cascade: ['persist', 'remove'])]
    private $user;

    public function __construct()
    {
        $this->id = Uuid::v4();
        $this->uuid = $this->id;
    }

    public function getUuid(): Uuid
    {
        return $this->uuid;
    }

    public function setUuid($uuid): self
    {
        $this->uuid = $uuid;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getSalt(): ?string
    {
        return $this->salt;
    }

    public function setSalt(string $salt): self
    {
        $this->salt = $salt;

        return $this;
    }

    public function getMd5(): ?string
    {
        return $this->md5;
    }

    public function setMd5(string $md5): self
    {
        $this->md5 = $md5;

        return $this;
    }

    public function getSha1(): ?string
    {
        return $this->sha1;
    }

    public function setSha1(string $sha1): self
    {
        $this->sha1 = $sha1;

        return $this;
    }

    public function getSha256(): ?string
    {
        return $this->sha256;
    }

    public function setSha256(string $sha256): self
    {
        $this->sha256 = $sha256;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        // set the owning side of the relation if necessary
        if ($user->getLogin() !== $this) {
            $user->setLogin($this);
        }

        $this->user = $user;

        return $this;
    }
}
