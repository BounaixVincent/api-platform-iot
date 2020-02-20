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
     * @ORM\OneToMany(targetEntity="App\Entity\Brightness", mappedBy="b_equiments_id")
     */
    private $brightnesses;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Temperature", mappedBy="t_equipments_id")
     */
    private $temperatures;

    public function __construct()
    {
        $this->brightnesses = new ArrayCollection();
        $this->temperatures = new ArrayCollection();
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
    public function getBrightnesses(): Collection
    {
        return $this->brightnesses;
    }

    public function addBrightness(Brightness $brightness): self
    {
        if (!$this->brightnesses->contains($brightness)) {
            $this->brightnesses[] = $brightness;
            $brightness->setBEquimentsId($this);
        }

        return $this;
    }

    public function removeBrightness(Brightness $brightness): self
    {
        if ($this->brightnesses->contains($brightness)) {
            $this->brightnesses->removeElement($brightness);
            // set the owning side to null (unless already changed)
            if ($brightness->getBEquimentsId() === $this) {
                $brightness->setBEquimentsId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Temperature[]
     */
    public function getTemperatures(): Collection
    {
        return $this->temperatures;
    }

    public function addTemperature(Temperature $temperature): self
    {
        if (!$this->temperatures->contains($temperature)) {
            $this->temperatures[] = $temperature;
            $temperature->setTEquipmentsId($this);
        }

        return $this;
    }

    public function removeTemperature(Temperature $temperature): self
    {
        if ($this->temperatures->contains($temperature)) {
            $this->temperatures->removeElement($temperature);
            // set the owning side to null (unless already changed)
            if ($temperature->getTEquipmentsId() === $this) {
                $temperature->setTEquipmentsId(null);
            }
        }

        return $this;
    }
}
