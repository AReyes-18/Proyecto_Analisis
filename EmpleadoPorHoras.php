<?php
require_once 'Empleado.php';

class EmpleadoPorHoras extends Empleado {
    private $tarifaPorHora;
    private $horasTrabajadas;

    public function __construct($nombre, $puesto, $tarifaPorHora, $horasTrabajadas) {
        parent::__construct($nombre, $puesto);
        $this->tarifaPorHora = $tarifaPorHora;
        $this->horasTrabajadas = $horasTrabajadas;
    }

    public function calcularSalario() {
        return $this->tarifaPorHora * $this->horasTrabajadas;
    }
}
?>
