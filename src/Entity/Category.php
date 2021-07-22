<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Loisir::class, mappedBy="category")
     */
    private $loisirs;

    

    public function __construct()
    {
        $this->user = new ArrayCollection();
        $this->loisirs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Loisir[]
     */
    public function getLoisirs(): Collection
    {
        return $this->loisirs;
    }

    public function addLoisir(Loisir $loisir): self
    {
        if (!$this->loisirs->contains($loisir)) {
            $this->loisirs[] = $loisir;
            $loisir->setCategory($this);
        }

        return $this;
    }

    public function removeLoisir(Loisir $loisir): self
    {
        if ($this->loisirs->removeElement($loisir)) {
            // set the owning side to null (unless already changed)
            if ($loisir->getCategory() === $this) {
                $loisir->setCategory(null);
            }
        }

        return $this;
    }

    
}
