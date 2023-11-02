<?php
session_start();

// Elimina la variable de sesión `logged_in`
unset($_SESSION['logged_in']);

// Elimina todas las variables de sesión
$_SESSION = array();

// Elimina la cookie de sesión
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), "", time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
}

// Redirige al usuario a la página de inicio de sesión
header("Location: ../../index.php");
exit();
?>
