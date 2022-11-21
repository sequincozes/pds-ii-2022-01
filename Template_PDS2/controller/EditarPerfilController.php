<?php

header('Content-Type: application/json; charset=utf-8');
require_once("../model/EditarPerfilUsuarioModel.php");
require_once("../iniciarSessao.php");

$dados = $_POST["campos"];
$msg = "";

if(empty($_POST["campos"])){
    $msg = "Nenhum campo modificado";
    echo json_encode($msg);

}

else{

    $dadosMod = [];
    $email = $_POST["campos"]["email"];

    $nome_user = $_POST["campos"]["nome"];
    $cidade_user = $_POST["campos"]["cidade"];
    $biografia_user = $_POST["campos"]["biografia"];
    $dataNascimento_user = $_POST["campos"]["data"];
    $senha_user = $_POST["campos"]["senha"];
    $data_Nasc = implode("-",array_reverse(explode("/",$dataNascimento_user)));
    $inst= $_POST["campos"]["inst"];

    if(!empty($nome_user)){
        $nomeUser = filter_var($nome_user, FILTER_SANITIZE_SPECIAL_CHARS);
        $dadosMod["nome"]= $nomeUser;
    }
    if(!empty($cidade_user)){
        $cidadeUser = filter_var($cidade_user, FILTER_SANITIZE_SPECIAL_CHARS);
        $dadosMod["cidade"]= $cidadeUser;
    }
    if(!empty($biografia_user)){   
        $biografiaUser = filter_var($biografia_user, FILTER_SANITIZE_SPECIAL_CHARS);
        $dadosMod["biografia"]=  $biografiaUser;
    }
    if(!empty($data_Nasc)){   
        $dataUser = filter_var($data_Nasc,FILTER_SANITIZE_SPECIAL_CHARS);
        $dadosMod["dataNascimento"]= $dataUser;
    }
    if(!empty($senha_user)){
        $senhaUser = filter_var($senha_user,FILTER_SANITIZE_SPECIAL_CHARS);

        $pattern = '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[a-zA-Z\d].\S{8,36}$/';
        if(preg_match($pattern, $senhaUser) == false){
            $erro = "Senha Invalida";
            echo json_encode($erro);
        }else{
            $senhaUsuario = password_hash($senha_user, PASSWORD_DEFAULT);
            $dadosMod["senha"]= $senhaUsuario;
        }
    }

$msg = "Certo";

atualizarBanco($msg,$dadosMod,$email,$inst);

}

?>
