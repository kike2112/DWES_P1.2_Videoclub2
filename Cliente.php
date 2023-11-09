<?php
class Cliente {
    public string $nombre;
    private int $num_cliente;
    private array $soportesAlquilados = [];
    private int $numSoportesAlquilados;
    private int $maxAlquilerConcurrente;


    public function __construct(string $nombre, int $num_cliente)
    {
        $this->nombre = $nombre;
        $this->num_cliente = $num_cliente;
        $this->maxAlquilerConcurrente = 3;
        $this->numSoportesAlquilados = 0;
    }


    public function getNumCliente(): int
    {
        return $this->num_cliente;
    }

    public function setNumCliente(int $num_cliente): void
    {
        $this->num_cliente = $num_cliente;
    }

    public function getNumSoportesAlquilados(): int
    {
        return $this->numSoportesAlquilados;
    }

    public function setMaxAlquilerConcurrente(int $maxAlquilerConcurrente): void
    {
        $this->maxAlquilerConcurrente = $maxAlquilerConcurrente;
    }

    public function muestraResumen(): void
    {
        $cantidad = count($this->soportesAlquilados);
        echo "Cliente " . $this->getNumCliente() . ": " . $this->nombre ."\nAlquileres actuales: $cantidad\n\n";
    }
    public function tieneAlquilado(Soporte $soporte) : bool
    {
        $alquilado = false;
        foreach ($this->soportesAlquilados as $sopor) {
            if ($sopor->getNumProducto() == $soporte->getNumProducto()) {
                $alquilado = true;
            }
        }
        return $alquilado;
    }
    public function alquilar(Soporte $soporte) : bool
    {
        if ($this->tieneAlquilado($soporte)) {
            echo "\033[31m"; // rojo
            echo "\nEl cliente ya tiene alquilado el soporte '" . $soporte->titulo . "'\n";
            echo "\033[0m"; // negro
            return false;
        } elseif (!$this->tieneAlquilado($soporte) && $this->numSoportesAlquilados >= $this->maxAlquilerConcurrente) {
            echo "\033[31m"; // rojo
            echo "\nNo puede aquilar más de $this->maxAlquilerConcurrente soportes. Debe devolver algo\n";
            echo "\033[0m"; // negro
            return false;
        } else {
//            array_push($this->soportesAlquilados, $soporte);
            $this->soportesAlquilados[$soporte->getNumProducto()] = $soporte;
            $this->numSoportesAlquilados++;
            echo "\033[32m"; // verde
            echo "\nALQUILADO soporte con id" . $soporte->getNumProducto() . " por el cliente $this->nombre \n";
            echo "\033[0m"; // negro
            return true;
        }
    }
    public function devolver(Soporte $soporte) : bool
    {
        if ($this->tieneAlquilado($soporte)) {
            unset($this->soportesAlquilados[$soporte->getNumProducto()]);
            $this->numSoportesAlquilados--;
            echo "\033[32m"; // verde
            echo "\nDEVUELTO soporte con id " . $soporte->getNumProducto() . " por el cliente: $this->nombre\n";
            echo "\033[0m"; // negro
            return true;
        } else {
            echo "\033[31m"; // rojo
            echo "\nIMPOSIBLE DEVOLVER - El cliente $this->nombre NO TIENE alquilado el soporte con id:" . $soporte->getNumProducto() . "\n";
            echo "\033[0m"; // negro
            return false;
        }
    }

    public function listaAlquileres(): void
    {
        echo "\nEl cliente tiene $this->numSoportesAlquilados soportes alquilados:\n";
        foreach ($this->soportesAlquilados as $soporte) {
            echo $soporte->muestraResumen();
        }
    }
}