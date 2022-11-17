<?php

    function atualizarBanco($msg,$dadosMod,$nome_user){

        require_once("../iniciarSessao.php");
        require_once("ConexaoBD.php");
    
        try{

         $sql = "UPDATE usuario SET ";

         $keys = array_keys($dadosMod);
         $values = array_values($dadosMod);

        
        foreach ($dadosMod as $key => $value) {
            $sql = $sql . strval($key) . "=? ,";
        }

        $sql = substr($sql, 0, -1);
        $sql = $sql . " WHERE nome=?;";
        $valores = "";

        for($i=0;$i<count($values);$i++){
            $valores = $valores ."'".strval($values[$i])."'".",";  
        }

        $valores = $valores . "'gabriel vinicius ramos'";

        $stmt= $conn->prepare($sql);
        $stmt->execute([$valores]);


         echo json_encode($sql . "  ".$valores);
        
            

        }catch(PDOException $e){
            
        }

    }

?>