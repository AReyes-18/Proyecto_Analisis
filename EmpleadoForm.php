<?php
class EmpleadoForm {
    public function mostrarFormulario($nombre = '', $puesto = '', $tipo = '', $salario = '', $tarifaPorHora = '', $horasTrabajadas = '', $errores = []) {
        ?>
        <form method="POST">
            <p>
                <label for="nombre">Nombre:</label><br>
                <input type="text" name="nombre" value="<?= htmlspecialchars($nombre) ?>">
                <span style="color: red;"><?= $errores['nombre'] ?? '' ?></span>
            </p>
            <p>
                <label for="puesto">Puesto:</label><br>
                <input type="text" name="puesto" value="<?= htmlspecialchars($puesto) ?>">
                <span style="color: red;"><?= $errores['puesto'] ?? '' ?></span>
            </p>
            <p>
                <label for="tipo">Tipo de Empleado:</label><br>
                <select name="tipo" onchange="toggleFields(this.value)">
                    <option value="">Seleccione</option>
                    <option value="fijo" <?= $tipo === 'fijo' ? 'selected' : '' ?>>Fijo</option>
                    <option value="horas" <?= $tipo === 'horas' ? 'selected' : '' ?>>Por Horas</option>
                </select>
            </p>
            <div id="fijo" style="display: <?= $tipo === 'fijo' ? 'block' : 'none' ?>;">
                <p>
                    <label for="salario">Salario:</label><br>
                    <input type="number" name="salario" step="0.01" value="<?= htmlspecialchars($salario) ?>">
                    <span style="color: red;"><?= $errores['salario'] ?? '' ?></span>
                </p>
            </div>
            <div id="horas" style="display: <?= $tipo === 'horas' ? 'block' : 'none' ?>;">
                <p>
                    <label for="tarifa_por_hora">Tarifa por Hora:</label><br>
                    <input type="number" name="tarifa_por_hora" step="0.01" value="<?= htmlspecialchars($tarifaPorHora) ?>">
                    <span style="color: red;"><?= $errores['tarifa_por_hora'] ?? '' ?></span>
                </p>
                <p>
                    <label for="horas_trabajadas">Horas Trabajadas:</label><br>
                    <input type="number" name="horas_trabajadas" value="<?= htmlspecialchars($horasTrabajadas) ?>">
                    <span style="color: red;"><?= $errores['horas_trabajadas'] ?? '' ?></span>
                </p>
            </div>
            <p>
                <input type="submit" value="Enviar">
            </p>
        </form>

        <script>
            function toggleFields(tipo) {
                document.getElementById('fijo').style.display = tipo === 'fijo' ? 'block' : 'none';
                document.getElementById('horas').style.display = tipo === 'horas' ? 'block' : 'none';
            }
        </script>
        <?php
    }
}
?>
