<?php
class CintaVideo extends Soporte {

    private int $duracion;

    public function __construct(string $titulo, int $num_producto, float $precio, int $duracion)
    {
        parent::__construct($titulo, $num_producto, $precio);
        $this->duracion = $duracion;
    }
    public function muestraResumen(): void
    {
        echo "Película en VHS:";
        parent::muestraResumen();
        echo "\nDuración: $this->duracion minutos\n\n";
    }
}