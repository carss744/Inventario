<?php
$acta=$_FILES['acta'];
$nombre_acta=$_FILES['acta']['name'];
$ruta=$_FILES['acta']['tmp_name'];
$destino="../actas/".$nombre_acta;

if (copy($ruta, $destino)) {
    echo '
    <div class="notification is-info is-light">
        <strong>¡ACTA GUARDADA!</strong><br>
        El acta que cargo se ha guardado correctamente
    </div>
';
} else {
    echo '
    <div class="notification is-danger is-light">
        <strong>¡Ocurrio un error inesperado!</strong><br>
        No se pudo registrar el acta, por favor intente nuevamente
    </div>
';
}
?>