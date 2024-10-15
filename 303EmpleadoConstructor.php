<?php

declare(strict_types=1);

class EmpleadoTlf {
    private string $nombre;
    private string $apellidos;
    private float $sueldo;
    private array $telefonos = []; 
    
    public function __construct(string $nombre, string $apellidos, float $sueldo = 1000) {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->sueldo = $sueldo;
    }

    // Métodos getter y setter
    public function getNombre(): string {
        return $this->nombre;
    }

    public function getApellidos(): string {
        return $this->apellidos;
    }

    public function getSueldo(): float {
        return $this->sueldo;
    }

    public function setSueldo(float $sueldo): void {
        $this->sueldo = $sueldo;
    }
    public function getNombreCompleto(): string {
        return $this->nombre . ' ' . $this->apellidos;
    }

    public function debePagarImpuestos(): bool {
        return $this->sueldo > 3333;
    }


    public function anyadirTelefono(int $telefono): void {
        $this->telefonos[] = $telefono;  
    }

    
    public function listarTelefonos(): string {
        return implode(', ', $this->telefonos);  
    }

   
    public function vaciarTelefonos(): void {
        $this->telefonos = [];  
    }
}

// Ejemplo de uso
$empleado = new EmpleadoTlf("Juan", "Pérez");

// Mostrar información
echo "Sueldo: ". $empleado->getSueldo(). "<br>";
echo "Nombre Completo: " . $empleado->getNombreCompleto() . "<br>";
echo "Debe pagar impuestos: " . ($empleado->debePagarImpuestos() ? 'Sí' : 'No') . "<br>";



?>
