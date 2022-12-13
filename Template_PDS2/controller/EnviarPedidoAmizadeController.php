<?php

    require_once("../model/EnviarPedidoAmizadeModel.php");
    require_once("../iniciarSessao.php");

    $usuarioSolicitado = $_POST["usuarioSolicitado"];
    $usuarioSolicitante = $_SESSION["id"];

    enviarPedidoAmizade($usuarioSolicitado,$usuarioSolicitante);

?>