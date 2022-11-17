<?php

require_once("model/LoginUsuarioModel.php");

require_once('./iniciarSessao.php');
$nome = "";
$biografia = "";

if (isset($_SESSION["autenticado"])) {
  if (isset($_SESSION["autenticado"]) == true) {
    $nome = $_SESSION["nome"];
    $email = $_SESSION["email"];
    $biografia = $_SESSION["biografia"];
    $foto = $_SESSION["fotoPerfil"];
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
      <h1 id="colorlib-logo"><a href="index.html">Elen<span>.</span></a></h1>
      <nav id="colorlib-main-menu" role="navigation" class="mb-5">
        <ul>
          <li><a href="index.html">Home</a></li>
          <li><a href="photography.html">Photography</a></li>
          <li><a href="travel.html">Travel</a></li>
          <li><a href="fashion.html">Fashion</a></li>
          <li class="colorlib-active"><a href="about.php">Sobre</a></li>
          <li><a href="contact.html">Contact</a></li>
        </ul>
      </nav>

      <!-- Botão de Logout -->
      <?php if (session_status() == PHP_SESSION_ACTIVE && $_SESSION["autenticado"] == true) { ?>
        <form id="formSVG" action="./destruirSessao.php" method="POST">
          <button id="botaoLog" type="submit" class="btn" title="Desconectar"> <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="#6c757d" class="bi bi-door-closed-fill" viewBox="0 0 16 16">
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
      <!-- Form para Cadastro de Usuarios -->
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
                  <label data-error="wrong" data-success="right" for="orangeForm-name">Seu nome <span class="red">*</span></label>
                </div>
                <div class="md-form mb-3">
                  <i class="fas fa-envelope prefix grey-text"></i>
                  <input type="email" id="orangeForm-email" name="email" title="Digite seu email" class="form-control validate" required>
                  <label data-error="wrong" data-success="right" for="orangeForm-email">Seu email <span class="red">*</span></label>
                </div>

                <div class="md-form mb-3">
                  <i class="fas fa-lock prefix grey-text"></i>
                  <input type="password" id="orangeForm-pass" name="senha" title="Digite sua senha" class="form-control validate" required>
                  <label data-error="wrong" data-success="right" for="orangeForm-pass">Sua Senha <span class="red">*</span></label>
                </div>

                <div class="md-form mb-3">
                  <i class="fas fa-envelope prefix grey-text"></i>
                  <input type="text" id="orangeForm-cidade" name="cidade" title="Digite o nome da sua cidade" class="form-control validate" required>
                  <label data-error="wrong" data-success="right" for="orangeForm-email">Cidade <span class="red">*</span></label>
                </div>

                <div class="input-group">
                  <input type="text" class="form-control date fj-date" type="date" data-mdb-inline="true" id="orangeForm-date" name="dataN" aria-describedby="basic-addon2" required>
                  <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2"><i class="icon-calendar"></i></span>
                  </div>
                </div>

                <label data-error="wrong" data-success="right" for="orangeForm-date">Data de Nascimento <span class="red">*</span></label>

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

      <!--Fim Formulario-->



      <!-- Modal para edicao de perfil -->

      <form id="formProfileEdit" method="POST">
        <div id="modalEditProfile" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content" role="document">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Personalize seu perfil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="modal-body">
                <div class="container-xl ">
                  <!-- Account page navigation-->
                  <nav class="nav nav-borders">
                    <a class="nav-link active ms-0" href="https://www.bootdey.com/snippets/view/bs5-edit-profile-account-details" target="__blank" style="color:#fd7e14">Perfil</a>
                  </nav>
                  <hr class="mt-0 mb-4">
                  <div class="row">
                    <div class="col-xl-4">
                      <!-- Profile picture card-->
                      <div class="card mb-4 mb-xl-0">
                        <div class="card-header">Avatar</div>
                        <div class="card-body text-center">
                          <!-- Profile picture image-->
                          <img class="img-account-profile rounded-circle mb-2" src="images/author.jpg" alt="">
                          <!-- Profile picture help block-->
                          <div class="small font-italic text-muted mb-4">JPG ou PNG menor que 5MB</div>
                          <!-- Profile picture upload button-->
                          <button class="btn btn-primary" type="button">Trocar Avatar</button>
                        </div>
                      </div>
                    </div>
                    <div class="col-xl-8">
                      <!-- Account details card-->
                      <div class="card mb-4">
                        <div class="card-header">Informaçoes Pessoais</div>
                        <div class="card-body">
                          <form>
                            <!-- Form Group (username)-->
                            <div class="mb-3">
                              <label class="small mb-1" for="inputUsername">Nome de Usuario (Como seu nome vai aparecer no site) (Obrigatorio)<span class="red">*</span></label>
                              <input class="form-control" id="inputUsername" type="text" name="nomePerfil" placeholder="Digite seu nome" value="" required>
                            </div>
                            <!-- Form Row-->
                            <div class="mb-3">
                              <!-- Form Group (first name)-->
                              <label class="small mb-1" for="exampleFormControlTextarea1">Biografia (Fale um pouco sobre você)</label>
                              <textarea class="form-control" id="exampleFormControlTextarea1" name="biografiaPerfil" maxlength="393" placeholder="Fale em poucas palavras um poco sobre quem é você" rows="6"></textarea>

                            </div>

                            <div class="mb-3">
                              <label class="small mb-1" for="orangeForm-date">Data de Nascimento (Obrigatorio)<span class="red">*</span></label>
                              <div class="input-group">
                                <input type="text" class="form-control date fj-date" type="date" data-mdb-inline="true" id="orangeForm-date" name="dataPerfil" aria-describedby="basic-addon2" required>
                                <div class="input-group-append">
                                  <span class="input-group-text" id="basic-addon2"><i class="icon-calendar"></i></span>
                                </div>
                              </div>
                            </div>


                            <!-- Form Row        -->
                            <div class="row gx-3 mb-3">
                              <!-- Form Group (organization name)-->
                              <div class="col-md-6">
                                <label class="small mb-1" for="inputOrgName">Trabalho Atual(Opcional)</label>
                                <select id="selectInstituicao" class="form-select form-control text-muted" aria-label="Default select example">
                                  <option class="text-muted" selected>Selecione a Instituição</option>
                                  <option value="1">One</option>
                                  <option value="2">Two</option>
                                  <option value="3">Three</option>
                                </select>
                              </div>
                              <!-- Form Group (location)-->
                              <div class="col-md-6">
                                <label class="small mb-1" for="inputLocation">Cidade (Obrigatorio)<span class="red">*</span></label>
                                <input class="form-control" name="cidadePerfil" id="inputLocation" type="text" placeholder="Onde você reside ?" value="" required>
                              </div>
                            </div>
                            <!-- Form Group (email address)-->
                            <div class="mb-3">
                              <label class="small mb-1" for="inputEmailAddress">Email(Não Editável)</label>
                              <input class="form-control" id="emailAlteracao" type="email" name="emailPerfil" title="Email não pode ser alterado" placeholder="" disabled>
                            </div>

                            <div class="mb-3">
                              <label class="small mb-1" for="inputPass">Nova Senha (Opcional)</label>
                              <div class="input-group">
                                <input type="password" placeholder="Digite sua senha atual" name="senhaPerfil" title="Alterar senha" class="form-control" data-mdb-inline="true" id="inputAlterarSenha" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                  <span class="input-group-text" id="iconAlterarSenha"><i class="icon-edit"></i></span>
                                </div>
                              </div>
                            </div>

                            <div class="mb-3">
                              <label class="small mb-1" for="inputPass">Senha Atual(Obrigatório)<span class="red">*</span></label>
                              <div class="input-group">
                                <input type="password" placeholder="Digite sua senha atual" name="senhaPerfilConfirmacao" title="Alterar senha" class="form-control" data-mdb-inline="true" id="inputAlterarSenha" aria-describedby="basic-addon2" required>
                                <div class="input-group-append">
                                  <span class="input-group-text" id="iconAlterarSenha"><i class="icon-edit"></i></span>
                                </div>
                              </div>
                            </div>

                            <!-- Save changes button-->
                            <div class="half modal-footer d-flex justify-content-center">
                              <button id="salvarAlteracoes" class="btn btn-primary btn-lg btn-block" type="submit">Salvar Alterações</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </form>

      <!-- Fim do modal -->

      <!--Formulario Login -->
      <?php if (session_status() != PHP_SESSION_ACTIVE || $_SESSION["autenticado"] != true) { ?>
        <section class="vh-100">
          <form method="POST" id="formularioLogin" autocomplete="off">
            <div class="container py-4 h-100">
              <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                  <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">
                      <div class="col-md-6 col-lg-5 d-none d-md-block">
                        <img id="imageLogin" width="100%" src="images/image_1.jpg" />
                      </div>
                      <div class="col-md-6 col-lg-7 d-flex align-items-center">
                        <div class="card-body p-4 p-lg-5">
                          <div class="d-flex align-items-center pb-1">
                            <span class="h1">Login</span>
                          </div>

                          <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Entre com suas Credenciais</h5>

                          <div class="form-outline mb-2">
                            <i class="fas fa-envelope prefix grey-text"></i>
                            <input type="email" id="orangeForm-email" name="emailLogin" title="Digite seu email" class="form-control validate" required>
                            <label data-error="wrong" data-success="right" for="orangeForm-email">Seu email</label>
                          </div>

                          <div class="form-outline mb-4">
                            <i class="fas fa-lock prefix grey-text"></i>
                            <input type="password" id="orangeForm-pass" name="senhaLogin" title="Digite sua senha" class="form-control validate" required>
                            <label data-error="wrong" data-success="right" for="orangeForm-pass">Sua Senha</label>
                          </div>

                          <div class="pt-1 mb-2">
                            <button class="btn btn-primary btn-lg btn-block" type="submit">Entrar</button>
                          </div>

                          <div id="alert" class="alert alert-login alert-danger alert-dismissible fade show " role="alert">
                            Alerta Formulario Login
                          </div>

                          <a class="small text-muted" href="#!">Esqueceu sua senha ?</a>
                          <p class="mb-3 pb-lg-2">Ainda não possui uma conta ? <a data-toggle="modal" data-target="#modalRegisterForm" style="color: #fd7e14;">Registre-se</a></p>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </section>
      <?php } ?>

      <!--Fim do Formulario -->

      <?php if (session_status() == PHP_SESSION_ACTIVE && $_SESSION["autenticado"] == true) { ?>
        <div class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url(images/bg_6.jpg);" data-stellar-background-ratio="0.5">
          <div class="overlay"></div>
          <div class="js-fullheight d-flex justify-content-center align-items-center">
            <div class="col-md-8 text text-center">
              <div id="imageLogin2" class="img mb-3" style="background-image: url('images/author.jpg')"></div>
              <div class="desc">
                <h2 class="subheading">
                  Olá, eu sou
                </h2>

                <?php if (session_status() == PHP_SESSION_ACTIVE && $_SESSION["autenticado"] == true) { ?>
                  <h1 class="mb-3 nomeUser"><?php echo $nome ?></h1>
                  <p class="mb-4 biografia"><?php echo $biografia ?></p>
                  <ul class="ftco-social mt-3">
                  <li class="ftco-animate"><a data-toggle='modal' data-target='#modalEditProfile' onclick="buscarInfo('<?php echo $_SESSION['email'] ?>')"><span class="icon-settings ic" title="Editar Perfil"></span></a></li>
                    <li class="ftco-animate"><a href="#"><span class="icon-twitter ic" title="Twitter"></span></a></li>
                    <li class="ftco-animate"><a href="#"><span class="icon-facebook ic " title="Facebook"></span></a></li>
                    <li class="ftco-animate"><a href="#"><span class="icon-instagram ic" title="Instagram"></span></a></li>
                    
                  </ul>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>

        <div class="container">

          <div class="fab" ontouchstart="" title="Notificações">
            <button class="main">
            </button>
            <ul>
              <li>
                <div id="fb">
                  <div id="fb-top">
                    <p><b>Friend Requests</b><span>Find Friends &bull; Settings</span></p>
                  </div>
                  <img src="images/author.jpg" height="100" width="100" alt="Image of woman">
                  <p id="info"><b>Natalie G.</b> <br> <span>14 mutual friends</p>
                  <div id="button-block">
                    <div id="confirm">Confirm</div>
                    <div id="delete">Delete Request</div>
                  </div>
                </div>
              </li>

            </ul>
          </div>
        </div>
      <?php } ?>
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