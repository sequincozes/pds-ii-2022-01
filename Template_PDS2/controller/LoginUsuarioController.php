<?php

    require_once("../sessoes.php");
    require_once("../model/LoginUsuarioModel.php");

    $emailUser = filter_input(INPUT_POST, 'emailLogin', FILTER_SANITIZE_EMAIL);
    $senhaUser = filter_input(INPUT_POST, 'senhaLogin',FILTER_SANITIZE_SPECIAL_CHARS);

    $erro = "";

    if(!$emailUser = filter_input(INPUT_POST,'emailLogin',FILTER_VALIDATE_EMAIL)){
        $erro = "Email Invalido";
    }

    logarUsuario($emailUser,$senhaUser,$erro);


?>
