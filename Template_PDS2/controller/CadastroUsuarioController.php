<?php

    require_once("../model/CadastroUsuarioModel.php");

    $nome = $_POST["nome"];
    $cidade = $_POST["cidade"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $dataNasc = $_POST["data"];

    $nomeUser = filter_input(INPUT_POST, 'nome',FILTER_SANITIZE_SPECIAL_CHARS);
    $emailUser = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senhaUser = filter_input(INPUT_POST, 'senha',FILTER_SANITIZE_SPECIAL_CHARS);
    $cidadeUser = filter_input(INPUT_POST, 'cidade',FILTER_SANITIZE_SPECIAL_CHARS);
    $data = filter_input(INPUT_POST, 'data',FILTER_SANITIZE_SPECIAL_CHARS);
    $dataUser = implode("-",array_reverse(explode("/",$data)));
    
    $erro = "";

    if(!$emailUser = filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL)){
        $erro = "Email Invalido";
    }

    $pattern = '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[a-zA-Z\d].\S{8,36}$/';
    if(preg_match($pattern, $senhaUser) == false){
        $erro = "Senha Invalida";
    }

    cadastrarUsuario($nome,$email,$senha,$cidade,$dataUser,$erro);

?>