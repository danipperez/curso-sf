<?php

namespace App\Entity;

use App\Repository\ComentarioRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ComentarioRepository::class)
 */
class Comentario
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

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
     * @ORM\ManyToOne(targetEntity=Articulo::class, inversedBy="Comentario")
     * @ORM\JoinColumn(nullable=false)
     */
    private $articulo;

    /**
     * @ORM\ManyToOne(targetEntity=Usuario::class, inversedBy="comentarios")
     * @ORM\JoinColumn(nullable=false)
     */
    private $usuario;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getArticulo(): ?articulo
    {
        return $this->articulo;
    }

    public function setArticulo(?articulo $articulo): self
    {
        $this->articulo = $articulo;

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
