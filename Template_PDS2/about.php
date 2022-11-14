<?php

require_once("model/LoginUsuarioModel.php");

require_once('./iniciarSessao.php');
$nome = "";
$descricao = "";

if (isset($_SESSION["autenticado"])) {
  if (isset($_SESSION["autenticado"]) == true) {
    $nome = $_SESSION["nome"];
    $descricao = "Teste biografia";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login/Cadastro</title>
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

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">

</head>

<body>

  <div id="colorlib-page">
    <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
    <aside id="colorlib-aside" role="complementary" class="js-fullheight text-center">
      <h1 id="colorlib-logo"><a href="index.html">Logar<span>.</span></a></h1>
      <nav id="colorlib-main-menu" role="navigation" class="mb-5">
        <ul>
          <li><a href="index.html">Home</a></li>
          <li><a href="photography.html">Photography</a></li>
          <li><a href="travel.html">Travel</a></li>
          <li><a href="fashion.html">Fashion</a></li>
          <li class="colorlib-active"><a href="about.html">About</a></li>
          <li><a href="contact.html">Contact</a></li>

        </ul>
      </nav>

      <?php if (session_status() == PHP_SESSION_ACTIVE && $_SESSION["autenticado"] == true) { ?>
        <form id="formSVG" action="./destruirSessao.php" method="POST">
          <button id="botaoLog" type="submit" class="btn"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
              <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
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
      <form method="POST" id="formularioUsuarios" autocomplete="off">

        <div class="modal modal-cadastro fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Entre com suas Credencias</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body mx-3">
                <div class="md-form mb-3">
                  <i class="fas fa-user prefix grey-text"></i>
                  <input type="text" name="nome" id="orangeForm-name" title="Digite seu nome" class="form-control validate" required>
                  <label data-error="wrong" data-success="right" for="orangeForm-name">Seu nome</label>
                </div>
                <div class="md-form mb-3">
                  <i class="fas fa-envelope prefix grey-text"></i>
                  <input type="email" id="orangeForm-email" name="email" title="Digite seu email" class="form-control validate" required>
                  <label data-error="wrong" data-success="right" for="orangeForm-email">Seu email</label>
                </div>

                <div class="md-form mb-3">
                  <i class="fas fa-lock prefix grey-text"></i>
                  <input type="password" id="orangeForm-pass" name="senha" title="Digite sua senha" class="form-control validate" required>
                  <label data-error="wrong" data-success="right" for="orangeForm-pass">Sua Senha</label>
                </div>

                <div class="md-form mb-3">
                  <i class="fas fa-envelope prefix grey-text"></i>
                  <input type="text" id="orangeForm-cidade" name="cidade" title="Digite o nome da sua cidade" class="form-control validate" required>
                  <label data-error="wrong" data-success="right" for="orangeForm-email">Cidade</label>
                </div>

                <div class="input-group">
                  <input type="text" class="form-control date fj-date" type="date" data-mdb-inline="true" id="orangeForm-date" name="dataN" aria-describedby="basic-addon2" required>
                  <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2"><i class="icon-calendar"></i></span>
                  </div>
                </div>

                <label data-error="wrong" data-success="right" for="orangeForm-date">Data de Nascimento</label>

              </div>

              <div id="alert" class="alert alert-danger alert-dismissible fade show" role="alert">
                Alerta Formulario Usuarios
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="half modal-footer d-flex justify-content-center">
                <button type="submit" id="criarUser" class="btn btn-primary p-3 px-xl-4 py-xl-3">
                  Criar Conta
                </button>
              </div>

            </div>
          </div>
        </div>
      </form>

      <!--Fim modal-->

      <!--Inicio modal Login-->
      <form method="POST" id="formularioLogin" autocomplete="off">
        <div class="modal modal-login fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Entre com suas Credencias</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body mx-3">
                <div class="md-form mb-3">
                  <i class="fas fa-envelope prefix grey-text"></i>
                  <input type="email" id="orangeForm-email" name="emailLogin" title="Digite seu email" class="form-control validate" required>
                  <label data-error="wrong" data-success="right" for="orangeForm-email">Seu email</label>
                </div>

                <div class="md-form">
                  <i class="fas fa-lock prefix grey-text"></i>
                  <input type="password" id="orangeForm-pass" name="senhaLogin" title="Digite sua senha" class="form-control validate" required>
                  <label data-error="wrong" data-success="right" for="orangeForm-pass">Sua Senha</label>
                </div>

              </div>

              <div id="alert" class="alert alert-login alert-danger alert-dismissible fade show" role="alert">
                Alerta Formulario Login
              </div>

              <div class="half modal-footer d-flex justify-content-center">
                <button type="submit" id="loginUsuario" class="btn btn-primary p-3 px-xl-4 py-xl-3">
                  Entrar
                </button>
              </div>

            </div>
          </div>
        </div>
      </form>


      <div class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url(images/bg_6.jpg);" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="js-fullheight d-flex justify-content-center align-items-center">
          <div class="col-md-8 text text-center">
            <div id="imageLogin" class="img mb-4" style="background-image: url(images/author.jpg);"></div>
            <div class="desc">
              <h2 class="subheading">
                <?php

                if (!isset($_SESSION["autenticado"]) || $_SESSION["autenticado"] == null) {
                  echo "<a id='botaoModalLogin' data-toggle='modal' data-target='#modalLoginForm' style='color:#fd7e14'>" . 'Realizar Login' . "</a>" . "<br>";
                  echo "<a id='botaoModalRegister' data-toggle='modal' data-target='#modalRegisterForm'>" . "Criar Conta" . "</a>";
                } else {
                  echo "Olá, eu sou ";
                }
                ?>
              </h2>

              <?php if (session_status() == PHP_SESSION_ACTIVE && $_SESSION["autenticado"] == true) { ?>
                <h1 class="mb-4"><?php echo $nome ?></h1>
                <p class="mb-4"><?php echo $descricao ?></p>
                <ul class="ftco-social mt-3">
                  <li class="ftco-animate"><a href="#"><span class="icon-twitter" title="Twitter"></span></a></li>
                  <li class="ftco-animate"><a href="#"><span class="icon-facebook" title="Facebook"></span></a></li>
                  <li class="ftco-animate"><a href="#"><span class="icon-instagram" title="Instagram"></span></a></li>
                  <li class="ftco-animate"><a href="#"><span class="icon-settings" title="Editar Perfil"></span></a></li>
                </ul>
              <?php } ?>
            </div>
          </div>
        </div>-->
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