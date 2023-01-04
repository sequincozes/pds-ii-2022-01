<?php

function listarUsuarios(){

    require_once("../iniciarSessao.php");
    require_once("ConexaoBD.php");

    $busca = "select * from usuario";
    $result = $conn->prepare($busca);
    $result->execute();

    $dados = $result->fetchAll();

    echo json_encode($dados);
}

?>