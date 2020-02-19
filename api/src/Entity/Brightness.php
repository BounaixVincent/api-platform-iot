<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
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
    private $Brightness;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Equipments", inversedBy="brightness_sample")
     * @ORM\JoinColumn(nullable=false)
     */
    private $equipmentsÂ_id;

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
        return $this->Brightness;
    }

    public function setBrightness(int $Brightness): self
    {
        $this->Brightness = $Brightness;

        return $this;
    }

    public function getEquipmentsÂId(): ?Equipments
    {
        return $this->equipmentsÂ_id;
    }

    public function setEquipmentsÂId(?Equipments $equipmentsÂ_id): self
    {
        $this->equipmentsÂ_id = $equipmentsÂ_id;

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
