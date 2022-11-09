<?php

    function logarUsuario($emailUser,$senhaUser,$msg){

        require_once("ConexaoBD.php");

        try{
            if (empty($msg)) {

                $stmt = $conn->prepare("SELECT senha FROM usuario WHERE email=?");
                $stmt->execute([$emailUser]);
                $userEx = $stmt->fetch();

                if(empty($userEx)){
                    $msg = "Consulta Vazia";
                }
                else if(count($userEx)>0 and password_verify($senhaUser, $userEx[0])){
                    $msg = "Usuario Existe";
                }
                else if(count($userEx)>0 and !password_verify($senhaUser, $userEx[0])){
                    $msg = "Senha Incorreta";
                
                }
            }

            echo json_encode($msg);

        }catch(PDOException $e){

        }

    }
