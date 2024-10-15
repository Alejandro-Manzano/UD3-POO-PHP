<?php

declare(strict_types=1);

class EmpleadoTlf {

    // Declaración de propiedades en el constructor
    public function __construct(
        private string $nombre,
        private string $apellidos,
        private float $sueldo,
        private float $sueldoTope, // Sueldo tope para determinar si debe pagar impuestos
        private array $telefonos = [] // Inicializa el array de teléfonos
    ) {}

    // Métodos getter y setter
    public function getsueldoTope(): float {
        return $this->sueldoTope;
    }

    public function setsueldoTope(float $sueldoTope): void {
        $this->sueldoTope = $sueldoTope; // Asignación correcta a la propiedad
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

    // Método que determina si debe pagar impuestos
    public function debePagarImpuestos(): bool {
        return $this->sueldo > $this->sueldoTope; // Compara sueldo con sueldoTope
    }

    // Añadir un teléfono
    public function anyadirTelefono(string $telefono): void {
        $this->telefonos[] = $telefono;  
    }

    // Listar teléfonos
    public function listarTelefonos(): string {
        return implode(', ', $this->telefonos);  
    }

    // Vaciar teléfonos
    public function vaciarTelefonos(): void {
        $this->telefonos = [];  
    }

    // Método estático para convertir a HTML
    public static function toHtml(EmpleadoTlf $emp): string {
        return "
            <p>Sueldo: " . $emp->getSueldo() . " €</p> 
            <p>Nombre Completo: " . $emp->getNombreCompleto() . "</p> 
            <p>Debe pagar impuestos: " . ($emp->debePagarImpuestos() ? 'Sí' : 'No') . "</p>
        ";
    }
}

// Ejemplo de uso
$empleado = new EmpleadoTlf("Juan", "Pérez", 5000, 4000); // Sueldo tope 4000

//echo EmpleadoTlf::toHtml($empleado);
echo $empleado->toHtml($empleado)

?>
