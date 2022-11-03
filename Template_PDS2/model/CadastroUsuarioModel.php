<?php

function cadastrarUsuario($nome, $email, $senha, $cidade, $dataNasc)
{
    try {

        include_once("model/ConexaoBD.php");

        $id = 1;
        $sql = "INSERT INTO usuario('fk_tipoUsuario','senha','cidade','nome','email') values (?,?,?,?,?);";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->bindParam(2, $senha);
        $stmt->bindParam(3, $cidade);
        $stmt->bindParam(4, $nome);
        $stmt->bindParam(5, $email);


        $stmt->execute();
    } catch (PDOException $e) {
        echo $e;
    }
}
