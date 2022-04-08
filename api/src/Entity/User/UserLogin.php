<?php

namespace App\Entity\User;

use App\Entity\Core\Identifiable\UuidTrait;
use App\Repository\User\UserLoginRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: UserLoginRepository::class)]
#[ORM\Table(name: '`user_login`')]
class UserLogin
{
    use UuidTrait;

    #[ORM\Column(type: 'uuid')]
    private $uuid;

    #[ORM\Column(type: 'string', length: 150)]
    private $username;

    #[ORM\Column(type: 'string', length: 255)]
    private $password;

    #[ORM\Column(type: 'string', length: 255)]
    private $salt;

    #[ORM\Column(type: 'string', length: 255)]
    private $md5;

    #[ORM\Column(type: 'string', length: 255)]
    private $sha1;

    #[ORM\Column(type: 'string', length: 255)]
    private $sha256;

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
}
