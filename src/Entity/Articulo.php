<?php

namespace App\Entity;

use App\Repository\ArticuloRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArticuloRepository::class)
 */
class Articulo
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
    private $titulo;

    /**
     * @ORM\Column(type="text")
     */
    private $contenido;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fechapub;

    /**
     * @ORM\Column(type="boolean")
     */
    private $aprobado;

    /**
     * @ORM\OneToMany(targetEntity=Comentario::class, mappedBy="Articulo")
     */
    private $comentario;

    /**
     * @ORM\ManyToOne(targetEntity=Usuario::class, inversedBy="articulos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $usuario;

    public function __construct()
    {
        $this->comentario = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getContenido(): ?string
    {
        return $this->contenido;
    }

    public function setContenido(string $contenido): self
    {
        $this->contenido = $contenido;

        return $this;
    }

    public function getFechapub(): ?\DateTimeInterface
    {
        return $this->fechapub;
    }

    public function setFechapub(\DateTimeInterface $fechapub): self
    {
        $this->fechapub = $fechapub;

        return $this;
    }

    public function getAprobado(): ?bool
    {
        return $this->aprobado;
    }

    public function setAprobado(bool $aprobado): self
    {
        $this->aprobado = $aprobado;

        return $this;
    }

    /**
     * @return Collection|comentario[]
     */
    public function getComentario(): Collection
    {
        return $this->comentario;
    }

    public function addComentario(comentario $comentario): self
    {
        if (!$this->comentario->contains($comentario)) {
            $this->comentario[] = $comentario;
            $comentario->setArticulo($this);
        }

        return $this;
    }

    public function removeComentario(comentario $comentario): self
    {
        if ($this->comentario->removeElement($comentario)) {
            // set the owning side to null (unless already changed)
            if ($comentario->getArticulo() === $this) {
                $comentario->setArticulo(null);
            }
        }

        return $this;
    }

    public function getUsuario(): ?Usuario
    {
        return $this->usuario;
    }

    public function setUsuario(?Usuario $usuario): self
    {
        $this->usuario = $usuario;

        return $this;
    }
}
