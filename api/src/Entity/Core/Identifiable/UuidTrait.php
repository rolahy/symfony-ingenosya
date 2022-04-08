<?php

namespace App\Entity\Core\Identifiable;

use ApiPlatform\Core\Annotation\ApiProperty;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Uid\Uuid;

trait UuidTrait
{
    /**
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true, nullable=false)
     * @ApiProperty(identifier=true)
     * @Groups({"read","read.lite"})
     */
    private Uuid $uuid;

    public function getUuid()
    {
        return $this->uuid;
    }

    public function setUuid(Uuid $uuid)
    {
        $this->uuid = $uuid;
    }
}
