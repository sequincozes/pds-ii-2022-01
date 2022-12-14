<?php

    require_once("../iniciarSessao.php");
    require_once("../model/CancelarPedidoAmizadeModel.php");

    $solicitado = $_POST["usuarioSolicitado"];
    $solicitante = $_SESSION["id"];

    cancelarSolicitacao($solicitado,$solicitante);

?>