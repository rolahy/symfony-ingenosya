<?php

namespace App\Entity\User;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Entity\Core\Identifiable\UuidTrait;
use App\Repository\User\UserNameRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: UserNameRepository::class)]
#[ORM\Table(name: '`user_name`')]
#[ApiResource()]
class UserName
{
    use UuidTrait;

    #[ORM\Column(type: 'string', length: 10)]
    private $title;

    #[ORM\Column(type: 'string', length: 255)]
    private $first;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $last;

    public function __construct()
    {
        $this->id = Uuid::v4();
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getFirst(): ?string
    {
        return $this->first;
    }

    public function setFirst(string $first): self
    {
        $this->first = $first;

        return $this;
    }

    public function getLast(): ?string
    {
        return $this->last;
    }

    public function setLast(?string $last): self
    {
        $this->last = $last;

        return $this;
    }
}
