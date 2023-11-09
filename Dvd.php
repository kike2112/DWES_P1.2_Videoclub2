<?php
class Dvd extends Soporte {

    public string $idiomas;
    private string $formatoPantalla;

    public function __construct(string $titulo, int $num_producto, float $precio, string $idiomas, string $formatoPantalla)
    {
        parent::__construct($titulo, $num_producto, $precio);
        $this->idiomas = $idiomas;
        $this->formatoPantalla = $formatoPantalla;
    }

    public function muestraResumen(): void
    {
        echo "Película en DVD:";
        parent::muestraResumen();
        echo "\nIdiomas: $this->idiomas\nFormato Pantalla: $this->formatoPantalla \n\n";
    }
}