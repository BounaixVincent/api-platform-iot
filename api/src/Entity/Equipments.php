<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EquipmentsRepository")
 */
class Equipments
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mac_address;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Brightness", mappedBy="equipmentsÂ_id")
     */
    private $brightness_sample;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Temperature", mappedBy="equipments_id")
     */
    private $equipments_sample;

    public function __construct()
    {
        $this->brightness_sample = new ArrayCollection();
        $this->equipments_sample = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMacAddress(): ?string
    {
        return $this->mac_address;
    }

    public function setMacAddress(string $mac_address): self
    {
        $this->mac_address = $mac_address;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection|Brightness[]
     */
    public function getBrightnessSample(): Collection
    {
        return $this->brightness_sample;
    }

    public function addBrightnessSample(Brightness $brightnessSample): self
    {
        if (!$this->brightness_sample->contains($brightnessSample)) {
            $this->brightness_sample[] = $brightnessSample;
            $brightnessSample->setEquipmentsÂId($this);
        }

        return $this;
    }

    public function removeBrightnessSample(Brightness $brightnessSample): self
    {
        if ($this->brightness_sample->contains($brightnessSample)) {
            $this->brightness_sample->removeElement($brightnessSample);
            // set the owning side to null (unless already changed)
            if ($brightnessSample->getEquipmentsÂId() === $this) {
                $brightnessSample->setEquipmentsÂId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Temperature[]
     */
    public function getEquipmentsSample(): Collection
    {
        return $this->equipments_sample;
    }

    public function addEquipmentsSample(Temperature $equipmentsSample): self
    {
        if (!$this->equipments_sample->contains($equipmentsSample)) {
            $this->equipments_sample[] = $equipmentsSample;
            $equipmentsSample->setEquipmentsId($this);
        }

        return $this;
    }

    public function removeEquipmentsSample(Temperature $equipmentsSample): self
    {
        if ($this->equipments_sample->contains($equipmentsSample)) {
            $this->equipments_sample->removeElement($equipmentsSample);
            // set the owning side to null (unless already changed)
            if ($equipmentsSample->getEquipmentsId() === $this) {
                $equipmentsSample->setEquipmentsId(null);
            }
        }

        return $this;
    }
}
