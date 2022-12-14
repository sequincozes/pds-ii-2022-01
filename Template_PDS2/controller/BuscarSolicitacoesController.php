<?php

    require_once("../iniciarSessao.php");
    require_once("../model/BuscarSolicitacoesModel.php");

    $idUser = $_SESSION["id"];

    buscarSolicitacoes($idUser);

?>