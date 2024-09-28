<?php
require_once 'Empleado.php';

class EmpleadoFijo extends Empleado {
    private $salario;

    public function __construct($nombre, $puesto, $salario) {
        parent::__construct($nombre, $puesto);
        $this->salario = $salario;
    }

    public function calcularSalario() {
        return $this->salario;
    }
}
?>
