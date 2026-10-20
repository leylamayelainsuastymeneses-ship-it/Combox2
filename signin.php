<?php

session_start();
require("config/database.php");

$correo = $_POST['email'] ?? '';
$clave = $_POST['password'] ?? '';
$clave_md5 = md5($clave);

// buscamos en las dos bases
$sql = "SELECT id, firstname FROM users WHERE email = '$correo' AND password = '$clave_md5' LIMIT 1";

$local = pg_query($local_conn, $sql);
$usuario = pg_fetch_assoc($local);

if (!$usuario) {
    $supa = pg_query($supa_conn, $sql);
    $usuario = pg_fetch_assoc($supa);
}


if ($usuario) {
    $_SESSION['nombre'] = $usuario['firstname'];
    header("refresh:0; url=index.html");
    exit;
} else {
    echo "<script>alert('Datos incorrectos'); history.back();</script>";
    exit;
}


?>
