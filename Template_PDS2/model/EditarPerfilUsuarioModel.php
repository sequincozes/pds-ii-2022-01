<?php

function atualizarBanco($msg, $dadosMod, $email,$inst)
{

    try {

        require_once("../iniciarSessao.php");
        require_once("ConexaoBD.php");


        if ($msg != "Certo") {
            $msg = "Erro Inesperado";
        } else {

            $idU = $_SESSION["id"];

            if(!empty($inst)){
                $sqlD = "delete from vinculosusuario where fk_Usuario=?";
                $stmD = $conn->prepare($sqlD);
                $stmD->execute([$idU]);

                $sqlI = "insert into vinculosusuario(fk_Usuario,fk_Vinculo) values (?,?);";
                $stmI = $conn->prepare($sqlI);
                $stmI->execute([$idU,$inst]);
            }

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
