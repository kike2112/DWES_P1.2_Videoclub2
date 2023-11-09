<?php

include_once "Resumible.php";
abstract class Soporte implements Resumible {
    public string $titulo;
    protected int $num_producto;
    private float $precio;
    private const IVA = 0.21;

    public function __construct(string $titulo, int $num_producto, float $precio)
    {
        $this->titulo = $titulo;
        $this->num_producto = $num_producto;
        $this->precio = $precio;
    }

    public function getPrecio(): float
    {
        return $this->precio;
    }

    public function getPrecioConIva(): float
    {
        $precioConIva = $this->precio * (1 + self::IVA);
        return round($precioConIva, 2);
    }

    public function getNumProducto(): int
    {
        return $this->num_producto;
    }
    public function muestraResumen(): void
    {
        echo "\n$this->titulo\n$this->precio € (IVA no incluido)";
    }

}