<?php
class Juego extends Soporte {

    public string $consola;
    private int $minNumJugadores;
    private int $maxNumJugadores;

    public function __construct(string $titulo, int $num_producto, float $precio, string $consola, int $minNumJugadores, int $maxNumJugadores)
    {
        parent::__construct($titulo, $num_producto, $precio);
        $this->consola = $consola;
        $this->minNumJugadores = $minNumJugadores;
        $this->maxNumJugadores = $maxNumJugadores;
    }

    public function muestraResumen(): void
    {
    echo "Juego para: $this->consola";
    parent::muestraResumen();
    $this->muestraJugadoresPosibles();
    }
    public function muestraJugadoresPosibles(): void
    {
        if ($this->minNumJugadores != $this->maxNumJugadores) {
            echo "\nDe $this->minNumJugadores a $this->maxNumJugadores jugadores\n\n";
        } elseif ($this->maxNumJugadores == 1) {
            echo "\nPara un jugador\n\n";
        } else {
            echo "\nPara $this->maxNumJugadores jugadores\n\n";
        }
    }
}