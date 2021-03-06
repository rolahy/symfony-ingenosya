<?php

namespace App\Entity\User;

use App\Entity\Core\Identifiable\UuidTrait;
use App\Repository\User\UserRegistrerRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: UserRegistrerRepository::class)]
#[ORM\Table(name: '`user_registered`')]
class UserRegistrer
{
    use UuidTrait;

    #[ORM\Column(type: 'datetime')]
    #[Groups(['users_list', 'users_login_details'])]
    private $date;

    #[ORM\Column(type: 'integer')]
    #[Groups(['users_list', 'users_login_details'])]
    private $age;

    public function __construct()
    {
        $this->id = Uuid::v4();
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }
}
