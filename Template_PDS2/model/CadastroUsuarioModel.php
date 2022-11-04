<?php

function cadastrarUsuario($nome, $email, $senha, $cidade, $dataNasc, $msg)
{
    try {
        require_once("ConexaoBD.php");

        if (empty($msg)) {

            $stmt = $conn->prepare("SELECT * FROM usuario WHERE email=?");
            $stmt->execute([$email]);
            $emailEx = $stmt->fetchAll();

            if (count($emailEx) > 0) {
                $msg = "Email Duplicado";
            } else {

                $senhaUser = password_hash($senha, PASSWORD_DEFAULT);
                $sql = "INSERT INTO usuario(fk_tipoUsuario,dataNascimento,senha,cidade,nome,email) values (?,?,?,?,?,?)";

                $sth = $conn->prepare($sql);
                $id_tipo = 1;

                $sth->bindParam(1, $id_tipo, PDO::PARAM_INT);
                $sth->bindParam(2, $dataNasc, PDO::PARAM_STR);
                $sth->bindParam(3, $senhaUser, PDO::PARAM_STR);
                $sth->bindParam(4, $cidade, PDO::PARAM_STR);
                $sth->bindParam(5, $nome, PDO::PARAM_STR);
                $sth->bindParam(6, $email, PDO::PARAM_STR);

                $sth->execute();
                $msg = "Valido";
            }
        }
        echo json_encode($msg);
        
    } catch (PDOException $e) {
        echo $e;
    }
}
