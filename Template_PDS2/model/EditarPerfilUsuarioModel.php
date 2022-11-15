<?php

    require_once("../iniciarSessao.php");
    require_once("../model/ConexaoBD.php");

    function atualizaUsuario($nome,$email,$senha,$cidade,$dataUser,$instituicao,$erro){

        try{

            if (isset($_SESSION["autenticado"]) && $_SESSION["autenticado"] == true) {
                

            }

        }catch(PDOException $e){
            
        }

    }

?>