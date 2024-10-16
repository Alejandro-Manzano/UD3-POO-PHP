<?php

declare(strict_types=1);

class EmpleadoTlf {

    public function __construct(
        private string $nombre,
        private string $apellidos,
        private float $sueldo,
        private float $sueldoTope, 
        private array $telefonos = [] 
    ) {}

   
    public function getsueldoTope(): float {
        return $this->sueldoTope;
    }

    public function setsueldoTope(float $sueldoTope): void {
        $this->sueldoTope = $sueldoTope; 
    }
    
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
        return $this->sueldo > $this->sueldoTope; 
    }

    
    public function anyadirTelefono(string $telefono): void {
        $this->telefonos[] = $telefono;  
    }

    
    public function listarTelefonos(): string {
        return implode(', ', $this->telefonos);  
    }

    
    public function vaciarTelefonos(): void {
        $this->telefonos = [];  
    }

   
    public static function toHtml(EmpleadoTlf $emp): string {
        return "
            <p>Sueldo: " . $emp->getSueldo() . " €</p> 
            <p>Nombre Completo: " . $emp->getNombreCompleto() . "</p> 
            <p>Debe pagar impuestos: " . ($emp->debePagarImpuestos() ? 'Sí' : 'No') . "</p>
        ";
    }
}


$empleado = new EmpleadoTlf("Juan", "Pérez", 5000, 4000); // Sueldo tope 4000

echo EmpleadoTlf::toHtml($empleado);


?>
