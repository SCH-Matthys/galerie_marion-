<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity]
#[Vich\Uploadable]
class Image
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $fileName = null;

    #[Vich\UploadableField(mapping: 'article_images', fileNameProperty: 'fileName')]
    private ?File $file = null;

    #[ORM\ManyToOne(targetEntity: Article::class, inversedBy: 'images')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Article $article = null;

    #[ORM\Column(type: 'datetime_immutable', nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFileName(): ?string
    {
        return $this->fileName;
    }

    public function setFileName(?string $fileName): self
    {
        $this->fileName = $fileName;
        return $this;
    }

    public function getFile(): ?File
    {
        return $this->file;
    }

    public function setFile(?File $file = null): self
    {
        $this->file = $file;
        
        // Met à jour la date pour que Doctrine détecte le changement
        if ($file) {
            $this->updatedAt = new \DateTimeImmutable();
        }

        return $this;
    }

    public function getArticle(): ?Article
    {
        return $this->article;
    }

    public function setArticle(?Article $article): self
    {
        $this->article = $article;
        return $this;
    }
}