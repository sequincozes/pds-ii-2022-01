<?php

function logarUsuario($emailUser, $senhaUser, $msg)
{

    require_once("ConexaoBD.php");

    try {

        if (empty($msg)) {

            $stmt = $conn->prepare("SELECT senha,nome FROM usuario WHERE email=?");
            $stmt->execute([$emailUser]);
            $userEx = $stmt->fetch();

            if (empty($userEx)) {
                $msg = "Consulta Vazia";
            } else if (count($userEx) > 0 and password_verify($senhaUser, $userEx[0])) {
                $msg = "Usuario Existe";
                

                if (session_status() !== PHP_SESSION_ACTIVE) {
                    session_start();

                    $_SESSION["nome"] = $userEx["nome"];
                    $_SESSION["email"] = $emailUser;
                    $_SESSION["senha"] = $senhaUser;
                    $_SESSION['autenticado'] = true;

                }

            } else if (count($userEx) > 0 and !password_verify($senhaUser, $userEx[0])) {
                $msg = "Senha Incorreta";
            }
        }

        $dados = array("msg"=>$msg,"autenticacao"=>$_SESSION['autenticado']);

        echo json_encode($dados);
    } catch (PDOException $e) {
    }
}
