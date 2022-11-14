<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
unset($_SESSION['nome']);
unset($_SESSION['email']);
unset($_SESSION['senha']);
unset($_SESSION['autenticado']);
session_destroy();

header("Location: index.html");

?>