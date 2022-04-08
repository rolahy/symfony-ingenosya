<?php

namespace App\Entity\User;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Entity\Core\Identifiable\UuidTrait;
use App\Repository\User\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
#[ApiResource(
    collectionOperations: [
        'get' => [
            'method' => Request::METHOD_GET,
            'normalization_context' => [
                'groups' => ['users_list'],
            ],
        ],
    ],
    itemOperations: [
        'user_details' => [
            'method' => Request::METHOD_GET,
            'path' => '/users-details/{id}',
            'normalization_context' => [
                'groups' => ['users_login_details'],
            ],
        ],
    ],
)]
class User
{
    use UuidTrait;

    #[ORM\Column(type: 'string', length: 10)]
    #[Groups(['users_login_details'])]
    private $gender;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['users_list', 'users_login_details'])]
    private $email;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['users_login_details'])]
    private $phone;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['users_list', 'users_login_details'])]
    private $cell;

    #[ORM\Column(type: 'string', length: 255)]
    private $nat;

    #[ORM\OneToOne(targetEntity: UserName::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['users_list', 'users_login_details'])]
    private $name;

    #[ORM\OneToOne(targetEntity: UserLocation::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['users_login_details'])]
    private $location;

    #[ORM\OneToOne(targetEntity: UserRegistrer::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['users_list', 'users_login_details'])]
    private $registered;

    #[ORM\OneToOne(targetEntity: UserPicture::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['users_list', 'users_login_details'])]
    private $picture;

    #[ORM\OneToOne(inversedBy: 'user', targetEntity: UserLogin::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['users_list'])]
    private $login;

    public function __construct()
    {
        $this->id = Uuid::v4();
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): self
    {
        $this->gender = $gender;

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

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getCell(): ?string
    {
        return $this->cell;
    }

    public function setCell(?string $cell): self
    {
        $this->cell = $cell;

        return $this;
    }

    public function getNat(): ?string
    {
        return $this->nat;
    }

    public function setNat(string $nat): self
    {
        $this->nat = $nat;

        return $this;
    }

    public function getName(): ?UserName
    {
        return $this->name;
    }

    public function setName(UserName $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getLocation(): ?UserLocation
    {
        return $this->location;
    }

    public function setLocation(UserLocation $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getRegistered(): ?UserRegistrer
    {
        return $this->registered;
    }

    public function setRegistered(UserRegistrer $registered): self
    {
        $this->registered = $registered;

        return $this;
    }

    public function getPicture(): ?UserPicture
    {
        return $this->picture;
    }

    public function setPicture(UserPicture $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getLogin(): ?UserLogin
    {
        return $this->login;
    }

    public function setLogin(UserLogin $login): self
    {
        $this->login = $login;

        return $this;
    }
}
