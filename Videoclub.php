<?php

class Videoclub
{
    private string $nombre;
    private array $productos = [];
    private int $numProductos = 0;
    private array $socios = [];
    private int $numSocios = 0;

    private function incluirProducto(Soporte $newProducto): void
    {
        $this->productos[$newProducto->getNumProducto()] = $newProducto;
        $this->numProductos++;
        echo "\033[32m"; // verde
        echo "Incluido soporte " . $newProducto->getNumProducto() . "\n";
        echo "\033[0m"; // negro
    }
    public function incluirCintaVideo(string $titulo, float $precio, int $duracion): void
    {
        $newProducto= new CintaVideo($titulo, $this->asignaNumProducto(), $precio, $duracion);
        $this->incluirProducto($newProducto);
    }
    public function incluirDvd(string $titulo, float $precio, string $idiomas, string $formatoPantalla): void
    {
        $newProducto= new Dvd($titulo, $this->asignaNumProducto(), $precio, $idiomas, $formatoPantalla);
        $this->incluirProducto($newProducto);
    }
    public function incluirJuego(string $titulo, float $precio, string $consola, int $minNumJugadores, int $maxNumJugadores): void
    {
        $newProducto= new Juego($titulo, $this->asignaNumProducto(), $precio, $consola, $minNumJugadores, $maxNumJugadores);
        $this->incluirProducto($newProducto);
    }
    public function incluirSocio(string $nombre, int $maxAlquilerConcurrente = 3): void
    {
        $newSocio= new Cliente($nombre, $this->asignaNumCliente());
        $newSocio->setMaxAlquilerConcurrente($maxAlquilerConcurrente);
        $this->socios[$newSocio->getNumCliente()] = $newSocio;
        $this->numSocios++;
        echo "\033[32m"; // verde
        echo "Incluido socio " . $newSocio->getNumCliente() . "\n";
        echo "\033[0m"; // negro
    }
    public function listarProductos(): void
    {
        echo "\n\nListado de los" . ($this->numProductos <= 1 ? "" : (" " . $this->numProductos)) . " productos disponibles:\n";

        if ($this->numProductos > 0) {
            $i = 1;
            foreach ($this->productos as $producto) {
                echo $i++ . ".- ";
                echo $producto->muestraResumen();
            }
        } else {
            echo "\033[31m"; // rojo
            echo "\nNo hay productos listados\n";
            echo "\033[0m"; // negro
        }

    }
    public function listarSocios(): void
    {
        echo "\n\nListado de los" . ($this->numSocios <= 1 ? "" : (" " . $this->numSocios)) . " socios:\n";

        if ($this->numSocios > 0) {
            $i = 1;
            foreach ($this->socios as $socio) {
                echo $i++ . ".- ";
                echo $socio->muestraResumen();
            }
        } else {
            echo "\033[31m"; // rojo
            echo "\nNo hay Socios listados\n";
            echo "\033[0m"; // negro
        }
    }
    public function alquilaSocioProducto(int $num_cliente, int $num_soporte): void
    {
        if (in_array($this->socios[$num_cliente], $this->socios)) {
            $this->socios[$num_cliente]->alquilar($this->productos[$num_soporte]);
        }

    }
    public function devuelveSocioProducto(int $num_cliente, int $num_soporte): void
    {
        if (in_array($this->socios[$num_cliente], $this->socios)) {
            $this->socios[$num_cliente]->devolver($this->productos[$num_soporte]);
        }
    }

    private function asignaNumCliente() : int
    {
        return count($this->socios) + 1;
    }
    private function asignaNumProducto() : int
    {
        return count($this->productos) + 1;
    }
}