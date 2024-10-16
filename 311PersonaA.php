<?php

declare(strict_types=1);

 abstract class Persona {
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

    public function __toString(): string {
        return " 
            Nombre: " . $this->nombre . "
            Apellido: " . $this->apellidos . "
            Edad: " . $this->edad . "
        ";
    }

    abstract public function toHtml(Persona $p) : string;
}

$persona = new Persona("Javi", "Fdez", 34);

echo $persona;

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

    public function __toString(): string {

        return "
            Nombre: " . $this->nombre . "
            Apellido: " . $this->apellidos . "
            Edad: " . $this->edad ."
            Sueldo: ". $this->sueldo ."
            Deber pagar impuestos: ".($this->debePagarImpuestos() ? "Si":"No")."

        ";

    }

    
}

$empleado = new Empleado("Alex", "Perez", 4000, 68);
echo "<br>";
echo $empleado;

?>
