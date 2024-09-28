<?php
abstract class Empleado {
    protected $nombre;
    protected $puesto;

    public function __construct($nombre, $puesto) {
        $this->nombre = $nombre;
        $this->puesto = $puesto;
    }

    abstract public function calcularSalario();
    
    public function mostrarInformacion() {
        return "Nombre: {$this->nombre}, Puesto: {$this->puesto}, Salario: " . $this->calcularSalario();
    }
}
?>
