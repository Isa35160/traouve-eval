<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity
 */
class Category extends AbstractController
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="label", type="string", length=255, nullable=false)
     */
    private $label;

    /**
     * @var string
     *
     * @ORM\Column(name="icon", type="string", length=255, nullable=false)
     */
    private $icon;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=255, nullable=false)
     */
    private $color;


    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Traobject", mappedBy="category")
     */

    private $traobject;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->traobject = new \Doctrine\Common\Collections\ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function setIcon(string $icon): self
    {
        $this->icon = $icon;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    /**
     * @Route("/show/{id}", name="category_show")
     */
    public function show(Category $category)
    {
        return $this->render('category/show.html.twig', [
            'category' => $category
        ]);
    }

    public function __toString()
    {
        return $this->getLabel();
    }

    /**
     * @return Collection|Traobject[]
     */
    public function getTraobject(): Collection
    {
        return $this->getTraobject();
    }

    public function addTraobject(Traobject $traobject): self
    {
        if (!$this->traobject->contains($traobject)) {
            $this->traobject[] = $traobject;
            $traobject->addCategory($this);
        }

        return $this;
    }

    public function removeTraobject(Traobject $traobject): self
    {
        if ($this->traobject->contains($traobject)) {
            $this->traobject->removeElement($traobject);
            $traobject->removeCategory($this);
        }

        return $this;
    }

}
