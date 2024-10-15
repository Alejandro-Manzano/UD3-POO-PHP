<?php

declare(strict_types=1);

class EmpleadoTlf {


    private const SUELDO_TOPE = 4000;

    //en php8 se declaran dentro dle propio constructor
    public function __construct(
        private string $nombre,
        private string $apellidos,
        private float $sueldo,
        private array $telefonos = []
    ) {}

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

    //añado la constante con self para saber que tengo que pagar impuestos
    public function debePagarImpuestos(): bool {
        return $this->sueldo > self::SUELDO_TOPE;
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
$empleado = new EmpleadoTlf("Juan", "Pérez", 5000);

// Mostrar información
echo "Sueldo: ". $empleado->getSueldo(). "<br>";
echo "Nombre Completo: " . $empleado->getNombreCompleto() . "<br>";
echo "Debe pagar impuestos: " . ($empleado->debePagarImpuestos() ? 'Sí' : 'No') . "<br>";



?>
