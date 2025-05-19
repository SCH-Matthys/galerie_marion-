<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[Vich\Uploadable]
#[ORM\Entity(repositoryClass: ArticleRepository::class)]
class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'articles')]
    private ?Theme $theme = null;

    #[ORM\OneToMany(mappedBy: 'article', targetEntity: Image::class, cascade: ['persist', 'remove'], orphanRemoval: true)]
    private Collection $images;

    // #[ORM\Column(length: 255)]
    // private ?string $caracteristique = null;

    #[ORM\Column(length: 255)]
    private ?string $artistName = null;

    #[ORM\Column(length: 255)]
    private ?string $articleDetails = null;

    #[ORM\Column(length: 255)]
    private ?string $technic = null;

    #[ORM\Column(length: 255)]
    private ?string $dimension = null;

    public function __construct()
    {
        $this->images = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getTheme(): ?Theme
    {
        return $this->theme;
    }

    public function setTheme(?Theme $theme): static
    {
        $this->theme = $theme;

        return $this;
    }

    // VICH BUNDLE

    // #[Vich\UploadableField(mapping: "images", fileNameProperty: "imageName")]
    // private ?File $imageFile = null;

    // #[ORM\Column(nullable: true)]
    // private ?string $imageName = null;

    // #[ORM\Column(nullable: true)]
    // private ?DateTimeImmutable $updatedAt = null;

    // #[ORM\Column(length: 255)]
    // private ?string $caracterisiques = null;

    // public function setImageFile(?File $imageFile = null):void
    // {
    //     $this->imageFile = $imageFile;
    //     if($imageFile){
    //         $this->updatedAt = new \DateTimeImmutable();
    //     }
    // }

    // public function getImageFile(): ?File
    // {
    //     return $this->imageFile;
    // }

    // public function setImageName(?string $imageName): void
    // {
    //     $this->imageName = $imageName;
    // }

    // public function getImageName(): ?string
    // {
    //     return $this->imageName;
    // }

    // public function getCaracterisiques(): ?string
    // {
    //     return $this->caracterisiques;
    // }

    // public function setCaracterisiques(string $caracterisiques): static
    // {
    //     $this->caracterisiques = $caracterisiques;

    //     return $this;
    // }





    // Vich Multi Images

    /**
     * @return Collection<int, Image>
     */
    
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Image $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setArticle($this);
        }

        return $this;
    }

    public function removeImage(Image $image): self
    {
        if ($this->images->removeElement($image)) {
            if ($image->getArticle() === $this) {
                $image->setArticle(null);
            }
        }

        return $this;
    }

    // public function getCaracteristique(): ?string
    // {
    //     return $this->caracteristique;
    // }

    // public function setCaracteristique(string $caracteristique): static
    // {
    //     $this->caracteristique = $caracteristique;

    //     return $this;
    // }

    public function getArtistName(): ?string
    {
        return $this->artistName;
    }

    public function setArtistName(string $artistName): static
    {
        $this->artistName = $artistName;

        return $this;
    }

    public function getArticleDetails(): ?string
    {
        return $this->articleDetails;
    }

    public function setArticleDetails(string $articleDetails): static
    {
        $this->articleDetails = $articleDetails;

        return $this;
    }

    public function getTechnic(): ?string
    {
        return $this->technic;
    }

    public function setTechnic(string $technic): static
    {
        $this->technic = $technic;

        return $this;
    }

    public function getDimension(): ?string
    {
        return $this->dimension;
    }

    public function setDimension(string $dimension): static
    {
        $this->dimension = $dimension;

        return $this;
    }
}
