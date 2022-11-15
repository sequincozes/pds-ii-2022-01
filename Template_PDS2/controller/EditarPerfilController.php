<?php
require_once("../model/EditarPerfilUsuarioModel.php");

$nome = $_POST["nome"];
$cidade = $_POST["cidade"];
$email = $_POST["email"];
$senha = $_POST["senha"];
$dataNasc = $_POST["data"];
$instituicao = $_POST["instituicao"];

$nomeUser = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$emailUser = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$senhaUser = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);
$cidadeUser = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_SPECIAL_CHARS);
$data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_SPECIAL_CHARS);
$instituicao = filter_input(INPUT_POST, 'instituicao', FILTER_SANITIZE_NUMBER_INT);
$dataUser = implode("-", array_reverse(explode("/", $data)));

$erro = "";

if(!$emailUser = filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL)){
    $erro = "Email Invalido";
}

$pattern = '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[a-zA-Z\d].\S{8,36}$/';
if(preg_match($pattern, $senhaUser) == false){
    $erro = "Senha Invalida";
}

atualizaUsuario($nome,$email,$senha,$cidade,$dataUser,$instituicao,$erro);

?>
