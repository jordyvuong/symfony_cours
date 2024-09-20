<?php

namespace App\Entity;

use App\Repository\BlibliothequeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BlibliothequeRepository::class)]
class Blibliotheque
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $livres = null;

    #[ORM\Column(length: 255)]
    private ?string $lieu = null;

    /**
     * @var Collection<int, Book>
     */
    #[ORM\OneToMany(targetEntity: Book::class, mappedBy: 'relation')]
    private Collection $book;

    public function __construct()
    {
        $this->book = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLivres(): ?int
    {
        return $this->livres;
    }

    public function setLivres(int $livres): static
    {
        $this->livres = $livres;

        return $this;
    }

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(string $lieu): static
    {
        $this->lieu = $lieu;

        return $this;
    }

    /**
     * @return Collection<int, Book>
     */
    public function getBook(): Collection
    {
        return $this->book;
    }

    public function addBook(Book $book): static
    {
        if (!$this->book->contains($book)) {
            $this->book->add($book);
            $book->setRelation($this);
        }

        return $this;
    }

    public function removeBook(Book $book): static
    {
        if ($this->book->removeElement($book)) {
            // set the owning side to null (unless already changed)
            if ($book->getRelation() === $this) {
                $book->setRelation(null);
            }
        }

        return $this;
    }
}
