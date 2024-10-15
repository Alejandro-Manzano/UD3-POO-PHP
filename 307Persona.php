<?php

declare(strict_types=1);

class Persona {
    protected string $nombre;
    protected string $apellidos;

    public function __construct(string $nombre, string $apellidos) {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
    }

    // Métodos getter
    public function getNombre(): string {
        return $this->nombre;
    }

    public function getApellidos(): string {
        return $this->apellidos;
    }

    public function getNombreCompleto(): string {
        return $this->nombre . ' ' . $this->apellidos;
    }
}

    $persona = new Persona("Javi", "Fdez");
    echo "Se llama ". $persona->getNombreCompleto(). "<br>";

class Empleado extends Persona {
    private float $sueldo;
    private array $telefonos = [];

    public function __construct(string $nombre, string $apellidos, float $sueldo) {
        parent::__construct($nombre, $apellidos); // Llamada al constructor de Persona asi hereda
        $this->sueldo = $sueldo;
    }

    // Métodos getter y setter para sueldo
    public function getSueldo(): float {
        return $this->sueldo;
    }

    public function setSueldo(float $sueldo): void {
        $this->sueldo = $sueldo;
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

    $empleado = new Empleado("Alex", "Perez", 4000);
    echo "Se llama ". $empleado->getNombreCompleto(). "<br>";
    echo $empleado->getSueldo();

?>
