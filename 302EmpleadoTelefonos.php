<?php

declare(strict_types=1);

class EmpleadoTlf {
    private string $nombre;
    private string $apellidos;
    private float $sueldo;
    private array $telefonos = [];
    
    public function __construct(string $nombre, string $apellidos, float $sueldo) {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->sueldo = $sueldo;
    }

    // Métodos getter y setter
    public function getNombre(): string {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void {
        $this->nombre = $nombre;
    }

    public function getApellidos(): string {
        return $this->apellidos;
    }

    public function setApellidos(string $apellidos): void {
        $this->apellidos = $apellidos;
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
$empleado = new EmpleadoTlf("Juan", "Pérez", 3500);

// Añadir teléfonos
$empleado->anyadirTelefono(123456789);
$empleado->anyadirTelefono(987654321);

// Mostrar información
echo "Nombre Completo: " . $empleado->getNombreCompleto() . "<br>";
echo "Debe pagar impuestos: " . ($empleado->debePagarImpuestos() ? 'Sí' : 'No') . "<br>";

// Listar teléfonos
echo "Teléfonos: " . $empleado->listarTelefonos() . "<br>";

// Vaciar teléfonos
$empleado->vaciarTelefonos();
echo "Teléfonos después de vaciar: " . $empleado->listarTelefonos() . "<br>";

?>
