<?php

declare(strict_types=1);

class Persona {
    protected string $nombre;
    protected string $apellidos;
    protected int $edad;

    public function __construct(string $nombre, string $apellidos, int $edad) {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->edad = $edad;
    }

    public function getEdad(): int {
        return $this->edad;
    }

    public function setEdad(int $edad): int {
        $this->edad = $edad;
    }
    

    public function getNombre(): string {
        return $this->nombre;
    }

    public function getApellidos(): string {
        return $this->apellidos;
    }

    public function getNombreCompleto(): string {
        return $this->nombre . ' ' . $this->apellidos;
    }

    public static function toHtml(Persona $p): string {
        return "
            <p>Nombre Completo: " . $p->getNombreCompleto() . "</p> 
            <p>Edad: " . $p->getEdad(). " </p>
        ";
    }
}

class Empleado extends Persona {
    private float $sueldo;
    private array $telefonos = [];

    public function __construct(string $nombre, string $apellidos, float $sueldo, int $edad) {
        parent::__construct($nombre, $apellidos, $edad);
        $this->sueldo = $sueldo;
    }

    public function getSueldo(): float {
        return $this->sueldo;
    }

    public function setSueldo(float $sueldo): void {
        $this->sueldo = $sueldo;
    }

    public function debePagarImpuestos(): bool {
        return $this->sueldo > 3333 && $this->edad > 21 ;
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

    public static function toHtml(Persona $p): string {
        // Comprobamos si el objeto recibido es una instancia de Empleado
        if ($p instanceof Empleado) {
            // Si es un empleado, mostramos también los datos del sueldo e impuestos
            $empleado = $p; // hacemos un cast a Empleado
            return "
                <p>Nombre Completo: " . $empleado->getNombreCompleto() . "</p> 
                <p>Sueldo: " . $empleado->getSueldo() . " €</p> 
                <p>Debe pagar impuestos: " . ($empleado->debePagarImpuestos() ? 'Sí' : 'No') . "</p>
                <p>Teléfonos: " . $empleado->listarTelefonos() . "</p>
            ";
        } else {
            // Si no es un empleado, usamos el toHtml de Persona
            return Persona::toHtml($p);
        }
    }
}

// Ejemplos

$persona = new Persona("Javi", "Fdez", 34);
echo Persona::toHtml($persona) . "<br>";

$empleado = new Empleado("Alex", "Perez", 4000, 18);
$empleado->anyadirTelefono(123456789);
$empleado->anyadirTelefono(987654321);

echo Empleado::toHtml($empleado);

?>
