<?php

    require_once("../model/RecusarConviteAmizadeModel.php");

    $id = $_POST["solicitacao"];

    recusarSolicitacao($id);
?>