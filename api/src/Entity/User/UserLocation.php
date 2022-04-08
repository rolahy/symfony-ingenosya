<?php

namespace App\Entity\User;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Entity\Core\Identifiable\UuidTrait;
use App\Repository\User\UserLocationRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: UserLocationRepository::class)]
#[ORM\Table(name: '`user_location`')]
#[ApiResource()]
class UserLocation
{
    use UuidTrait;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['users_login_details'])]
    private $street;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['users_login_details'])]
    private $city;

    #[ORM\Column(type: 'string', length: 150)]
    #[Groups(['users_login_details'])]
    private $state;

    #[ORM\Column(type: 'string', length: 5)]
    #[Groups(['users_login_details'])]
    private $postcode;

    public function __construct()
    {
        $this->id = Uuid::v4();
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(string $street): self
    {
        $this->street = $street;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(string $state): self
    {
        $this->state = $state;

        return $this;
    }

    public function getPostcode(): ?string
    {
        return $this->postcode;
    }

    public function setPostcode(string $postcode): self
    {
        $this->postcode = $postcode;

        return $this;
    }
}
