<?php

namespace App\Entity\User;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Controller\Import\User\UsersImportController;
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
        /* 'import_external_datas' => [
            'method' => Request::METHOD_GET,
            'path' => '/users/import',
            'controller' => UsersImportController::class,
            'pagination_enabled' => false,
        ], */
        'get' => [
            'method' => Request::METHOD_GET,
            'normalization_context' => [
                'groups' => ['users_list'],
            ],
        ],
    ],
)]
class User
{
    use UuidTrait;

    #[ORM\Column(type: 'string', length: 10)]
    private $gender;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['users_list'])]
    private $email;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $phone;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $cell;

    #[ORM\Column(type: 'string', length: 255)]
    private $nat;

    #[ORM\OneToOne(targetEntity: UserName::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['users_list'])]
    private $name;

    #[ORM\OneToOne(targetEntity: UserLocation::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private $location;

    #[ORM\OneToOne(targetEntity: UserLogin::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['users_list'])]
    private $login;

    #[ORM\OneToOne(targetEntity: UserRegistrer::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['users_list'])]
    private $registered;

    #[ORM\OneToOne(targetEntity: UserPicture::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['users_list'])]
    private $picture;

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

    public function getLogin(): ?UserLogin
    {
        return $this->login;
    }

    public function setLogin(UserLogin $login): self
    {
        $this->login = $login;

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
}
