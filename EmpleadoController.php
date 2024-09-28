<?php
require_once 'models/EmpleadoFijo.php';
require_once 'models/EmpleadoPorHoras.php';
require_once 'forms/EmpleadoForm.php';

class EmpleadoController {
    public function handleRequest() {
        $form = new EmpleadoForm();
        $nombre = '';
        $puesto = '';
        $tipo = '';
        $salario = '';
        $tarifaPorHora = '';
        $horasTrabajadas = '';
        $errores = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'] ?? '';
            $puesto = $_POST['puesto'] ?? '';
            $tipo = $_POST['tipo'] ?? '';
            $salario = $_POST['salario'] ?? '';
            $tarifaPorHora = $_POST['tarifa_por_hora'] ?? '';
            $horasTrabajadas = $_POST['horas_trabajadas'] ?? '';

            // Validación
            if (empty($nombre)) $errores['nombre'] = 'El nombre es obligatorio.';
            if (empty($puesto)) $errores['puesto'] = 'El puesto es obligatorio.';
            if ($tipo === 'fijo' && empty($salario)) $errores['salario'] = 'El salario es obligatorio.';
            if ($tipo === 'horas' && (empty($tarifaPorHora) || empty($horasTrabajadas))) {
                $errores['tarifa_por_hora'] = 'La tarifa por hora y las horas trabajadas son obligatorias.';
            }

            // Crear empleado
            if (empty($errores)) {
                if ($tipo === 'fijo') {
                    $empleado = new EmpleadoFijo($nombre, $puesto, $salario);
                } else {
                    $empleado = new EmpleadoPorHoras($nombre, $puesto, $tarifaPorHora, $horasTrabajadas);
                }
                echo $empleado->mostrarInformacion(); // Muestra la información
                return; // Termina la ejecución
            }
        }

        // Mostrar formulario
        $form->mostrarFormulario($nombre, $puesto, $tipo, $salario, $tarifaPorHora, $horasTrabajadas, $errores);
    }
}
?>
