<?php

    declare(strict_types= 1);

class Empleado {
    // Propiedades privadas
    private string $nombre;
    private string  $apellidos;
    private float $sueldo;

    public function __construct($nombre, $apellidos, $sueldo) {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->sueldo = $sueldo;
    }
    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getApellidos() {
        return $this->apellidos;
    }

    public function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    public function getSueldo() {
        return $this->sueldo;
    }

    public function setSueldo($sueldo) {
        $this->sueldo = $sueldo;
    }

    public function getNombreCompleto(): string {
        return $this->nombre . ' ' . $this->apellidos;
    }

   
    public function debePagarImpuestos(): bool {
        return $this->sueldo > 3333;
    }
}


$empleado = new Empleado("Juan", "Pérez", 3500);
echo "Nombre Completo: " . $empleado->getNombreCompleto(). "<br>";
echo "Debe pagar impuestos: " . ($empleado->debePagarImpuestos() ? 'Sí' : 'No');

?>
