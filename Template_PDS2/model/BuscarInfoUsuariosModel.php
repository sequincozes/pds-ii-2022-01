<?php

    function buscarInfoUsuarios($email,$msg){

        require_once("ConexaoBD.php");
        require_once("../iniciarSessao.php");

        if(empty($msg)){

            $stmt = $conn->prepare("SELECT * FROM usuario WHERE email=?");
            $stmt->execute([$email]);
            $emailEx = $stmt->fetch();

            $nome = $emailEx["nome"];
            $biografia = $emailEx["biografia"];
            $cidade = $emailEx["cidade"];
            $senha = $emailEx["senha"];
            $dataNascimento = $emailEx["dataNascimento"];

           $msg = "Certo";

        }
        
        $dados = array("nome"=>$nome,"biografia"=>$biografia,"dataNascimento"=>$dataNascimento,"cidade"=>$cidade,"senha"=>$senha,"msg"=>$msg);
        echo json_encode($dados);

    }


?>