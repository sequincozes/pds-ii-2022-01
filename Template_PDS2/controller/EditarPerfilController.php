<?php

header('Content-Type: application/json; charset=utf-8');
require_once("../model/EditarPerfilUsuarioModel.php");

$dados = $_POST["campos"];
$msg = "";

if(empty($_POST["campos"])){
    $msg = "Nenhum campo modificado";
    echo json_encode($msg);

}

else{

    $dadosMod = [];

    $nome_user = $_POST["campos"]["nome"];
    $cidade_user = $_POST["campos"]["cidade"];
    $biografia_user = $_POST["campos"]["biografia"];
    $dataNascimento_user = $_POST["campos"]["data"];
    $data_Nasc = implode("-",array_reverse(explode("/",$dataNascimento_user)));

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
        $dataUser = filter_var($data_Nasc, FILTER_SANITIZE_SPECIAL_CHARS);
        $dadosMod["dataNascimento"]= $dataUser;
    }

/*$pattern = '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[a-zA-Z\d].\S{8,36}$/';
if(preg_match($pattern, $senhaUser) == false){
    $erro = "Senha Invalida";
}*/

$msg = "Sucesso";

atualizarBanco($msg,$dadosMod,$nome_user);

}

?>
