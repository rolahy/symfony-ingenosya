<?php

namespace App\Entity\User;

use App\Entity\Core\Identifiable\UuidTrait;
use App\Repository\User\UserPictureRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: UserPictureRepository::class)]
#[ORM\Table(name: '`user_picture`')]
class UserPicture
{
    use UuidTrait;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['users_login_details'])]
    private $large;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['users_login_details'])]
    private $medium;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['users_list', 'users_login_details'])]
    private $thumbnail;

    public function __construct()
    {
        $this->id = Uuid::v4();
    }

    public function getLarge(): ?string
    {
        return $this->large;
    }

    public function setLarge(?string $large): self
    {
        $this->large = $large;

        return $this;
    }

    public function getMedium(): ?string
    {
        return $this->medium;
    }

    public function setMedium(?string $medium): self
    {
        $this->medium = $medium;

        return $this;
    }

    public function getThumbnail(): ?string
    {
        return $this->thumbnail;
    }

    public function setThumbnail(?string $thumbnail): self
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }
}
