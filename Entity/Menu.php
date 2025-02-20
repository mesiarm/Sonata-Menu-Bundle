<?php

namespace Prodigious\Sonata\MenuBundle\Entity;

use App\Entity\Municipality;
use Doctrine\ORM\Mapping as ORM;
use Prodigious\Sonata\MenuBundle\Model\Menu as BaseMenu;

/**
 * @ORM\Table(name="sonata_menu")
 * @ORM\Entity(repositoryClass="Prodigious\Sonata\MenuBundle\Repository\MenuRepository")
 */
class Menu extends BaseMenu
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Orm\Column(type="string", length=255)
     * @var string|null $position
     */
    private ?string $position = null;

    /**
     * @ORM\ManyToOne(targetEntity="\App\Entity\Municipality")
     * @var Municipality|null $municipality
     */
    private ?Municipality $municipality = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPosition(): ?string
    {
        return $this->position;
    }

    public function setPosition(?string $position): static
    {
        $this->position = $position;

        return $this;
    }

    public function getPositions()
    {
        return [
            'topmenu' => 'Hlavní menu',
            'footer_1' => 'Patička 1',
            'footer_2' => 'Patička 2',
            'footer_3' => 'Patička 3',
        ];
    }

    public function getMunicipality(): ?Municipality
    {
        return $this->municipality;
    }

    public function setMunicipality(?Municipality $municipality): static
    {
        $this->municipality = $municipality;

        return $this;
    }

    public function __toString()
    {
        return $this->getName() ?? '';
    }
}