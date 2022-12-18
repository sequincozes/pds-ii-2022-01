<?php

    require_once("../model/ListaAmigosModel.php");

    $id = $_POST["idUsuario"];

    listarAmigos($id);

?>