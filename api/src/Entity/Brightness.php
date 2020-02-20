<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource
 * @ORM\Entity(repositoryClass="App\Repository\BrightnessRepository")
 */
class Brightness
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $brightness;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Equipments", inversedBy="brightnesses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $b_equiments_id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBrightness(): ?int
    {
        return $this->brightness;
    }

    public function setBrightness(int $brightness): self
    {
        $this->brightness = $brightness;

        return $this;
    }

    public function getBEquimentsId(): ?Equipments
    {
        return $this->b_equiments_id;
    }

    public function setBEquimentsId(?Equipments $b_equiments_id): self
    {
        $this->b_equiments_id = $b_equiments_id;

        return $this;
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
}
