<?php

    require_once("../model/BuscarInfoUsuariosModel.php");

    $email = $_POST["email"];
    $msg = "";

    if(empty($email)){
        $msg = "Erro no email";
    }

    buscarInfoUsuarios($email,$msg);

?>