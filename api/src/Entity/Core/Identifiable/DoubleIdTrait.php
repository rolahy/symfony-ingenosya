<?php

namespace App\Entity\Core\Identifiable;

use ApiPlatform\Core\Annotation\ApiProperty;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;

/**
 * Trait DoubleIdTrait.
 */
trait DoubleIdTrait
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    #[ApiProperty(identifier: false)]
    private $id;

    #[ORM\Id]
    #[ORM\Column(type: 'uuid', unique: true, nullable: true)]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    #[ApiProperty(identifier: true)]
    private Uuid $uuid;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    public function getUuid()
    {
        return $this->uuid;
    }

    public function setUuid(Uuid $uuid)
    {
        $this->uuid = $uuid;
    }
}
