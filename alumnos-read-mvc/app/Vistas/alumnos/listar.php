<?php
if (isset($error)): ?>
    <div class="error">
        <?php echo htmlspecialchars($error); ?>
    </div>
<?php endif; ?>

<?php if (empty($alumnos)): ?>
    <p>No hay ningun alumno</p>
<?php else: ?>
    <table>
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Edad</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($alumnos as $a): ?>
                <tr>
                    <td><?php echo htmlspecialchars($a->fechaCreacion); ?></td>
                    <td><?php echo htmlspecialchars($a->nombre); ?></td>
                    <td><?php echo htmlspecialchars($a->email ?: 'No tiene ningun correo'); ?></td>
                    <td><?php echo htmlspecialchars($a->edad); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>