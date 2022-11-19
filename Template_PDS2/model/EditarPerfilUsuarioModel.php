<?php

function atualizarBanco($msg, $dadosMod, $email)
{

    require_once("../iniciarSessao.php");
    require_once("ConexaoBD.php");

    try {

        if ($msg != "Certo") {
            $msg = "Erro Inesperado";
        } else {

            $sql = "UPDATE usuario SET ";

            $keys = array_keys($dadosMod);
            $values = array_values($dadosMod);


            foreach ($dadosMod as $key => $value) {
                $sql = $sql . strval($key) . "=? ,";
            }

            $sql = substr($sql, 0, -1);
            $sql = $sql . " WHERE email=?;";


            array_push($values, $email);

            $stmt = $conn->prepare($sql);
            $stmt->execute($values);

            if($dadosMod["nome"]){
                unset($_SESSION['nome']);
                $_SESSION["nome"] = $dadosMod["nome"];
            }

            if($dadosMod["biografia"]){
                unset($_SESSION['biografia']);
                $_SESSION["biografia"] = $dadosMod["biografia"];
            }
        }

        echo json_encode($values);

    } catch (PDOException $e) {
    }
}
