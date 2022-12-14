<?php

    require_once("../iniciarSessao.php");
    require_once("../model/AdicionarAmigoModel.php");

    $solicitante = $_POST["usuarioSolicitante"];
    $solicitado = $_SESSION["id"];
    $idSolicitacao = $_POST["solicitacao"];

    adicionarAmizade($solicitante,$solicitado,$idSolicitacao);

?>