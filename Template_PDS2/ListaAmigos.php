<?php

require_once("model/LoginUsuarioModel.php");
require_once("model/ConexaoBD.php");

require_once('./iniciarSessao.php');
$nome = "";
$biografia = "";

if (isset($_SESSION["autenticado"])) {
    if (isset($_SESSION["autenticado"]) == true) {
        $nome = $_SESSION["nome"];
        $email = $_SESSION["email"];
        $idUser = $_SESSION["id"];
        $biografia = $_SESSION["biografia"];
        $foto = $_SESSION["fotoPerfil"];
        if (empty($foto)) {
            $foto = "#";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $nome ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">


    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/PerfilUsuarios.css">
    <link rel="" href="scss/PerfilUsuario.scss">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/ListaAmigos.css">

    <style>
        .icon-trash {
            color: red;
        }
    </style>

</head>

<body>


    <div id="colorlib-page">

        <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
        <aside id="colorlib-aside" role="complementary" class="js-fullheight text-center">
            <h1 id="colorlib-logo"><a href="index.html">Elen<span>.</span></a></h1>
            <nav id="colorlib-main-menu" role="navigation" class="mb-5">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="photography.html">Caronas</a></li>
                    <li><a href="travel.html">Travel</a></li>
                    <li><a href="fashion.html">Fashion</a></li>
                    <li class="colorlib-active"><a href="PerfilUsuario.php">Perfil</a></li>
                    <li><a href="contact.html">Contatos</a></li>
                </ul>
            </nav>

            <!-- Botão de Logout -->
            <?php if (session_status() == PHP_SESSION_ACTIVE && $_SESSION["autenticado"] == true) { ?>
                <form id="formSVG" action="./destruirSessao.php" method="POST">
                    <button id="botaoLog" type="submit" class="btn" title="Desconectar"> <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="#6c757d" class="bi bi-door-closed-fill" viewBox="0 0 16 16">
                            <path d="M12 1a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2a1 1 0 0 1 1-1h8zm-2 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                        </svg></button>
                </form>


            <?php } ?>
            <div class="colorlib-footer">
                <ul>
                    <li><a href="#"><i class="icon-facebook"></i></a></li>
                    <li><a href="#"><i class="icon-twitter"></i></a></li>
                    <li><a href="#"><i class="icon-instagram"></i></a></li>
                    <li><a href="#"><i class="icon-linkedin"></i></a></li>

                </ul>

            </div>
        </aside> <!-- END COLORLIB-ASIDE -->



        <div id="colorlib-main">

            <div class="py-3 bg-gray">
                <div class="container">
                    <div class="row justify-content-center mb-3">
                        <div class="col-md-7 text-center">
                            <h3 class="mb-1">Suas Conexões</h3>
                            <h6 class="subtitle font-weight-normal">Aqui estão listadas todas as suas conexões,
                                toque em alguma delas para abrir seu perfil.
                            </h6>
                        </div>
                    </div>
                    <div class="row" id="listaAm">
                        
                        <!-- column  -->
                    </div>
                </div>
            </div>

        </div>
    </div>

    </div><!-- END COLORLIB-PAGE -->



    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
        </svg></div>


    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/CadastroUsuario.js"></script>
    <script src="js/LoginUsuario.js"></script>
    <script src="js/EditarPerfilUsuario.js"></script>
    <script src="js/ImagemPerfil.js"></script>
    <script src="js/PedidosAmizade.js"></script>

    <script src="js/ListaAmigos.js"></script>
    <script>
        $(document).ready(function () {
            listarAmigos(<?php echo $_SESSION["id"] ?>);
        })   
    </script>


    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="https://unpkg.com/htmlincludejs"></script>

    <script src="js/scrollax.min.js"></script>
    <script src="js/bootstrap-datepicker.js" ?></script>

    <script src="js/main.js"></script>



</body>

</html>