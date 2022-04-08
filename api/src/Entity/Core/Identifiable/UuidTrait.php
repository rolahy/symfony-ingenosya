<?php

namespace App\Entity\Core\Identifiable;

use ApiPlatform\Core\Annotation\ApiProperty;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;

trait UuidTrait
{
    #[ORM\Id]
    #[ORM\Column(type: 'uuid', unique: true, nullable: true)]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    #[ApiProperty(identifier: true)]
    private Uuid $id;

    public function getId(): Uuid
    {
        return $this->id;
    }

    public function setId(Uuid $id)
    {
        $this->id = $id;
    }
}
