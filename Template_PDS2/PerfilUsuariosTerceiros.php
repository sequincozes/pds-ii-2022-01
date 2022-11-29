<?php

require_once("model/ConexaoBD.php");
require_once('./iniciarSessao.php');

$idUsuario = $_GET["user"];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/PaginaTerceiros.js"></script>

  <link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/plug-ins/1.13.1/i18n/pt-BR.json" rel="stylesheet">
  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

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
  <link rel="stylesheet" href="css/PerfilTerceiros.css">

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">

  <script>
    $(document).ready(function() {

      exibirPagina(<?php echo $idUsuario ?>);
      $('#table_id').DataTable({

        "language": {
          "url": "https://cdn.datatables.net/plug-ins/1.13.1/i18n/pt-BR.json"
        }


      })
    })
  </script>

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
          <li class="colorlib-active"><a href="PerfilUsuario.php">Sobre</a></li>
          <li><a href="contact.html">Contact</a></li>
        </ul>
      </nav>

      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
        Launch demo modal
      </button>

      <!-- Modal -->
      <div class="modal fade" id="exampleModalCenter" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              ...
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
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
      <section style="background-image: url('images/bg_1.jpg');background-repeat: round;">
        <div class="container py-3">
          <div class="row">
            <div class="col-lg-4">
              <div class="card mb-4">
                <div class="card-body text-center">
                  <img src="" alt="avatar" class="img-account-profile rounded-circle mb-2 img-fluid foto" style="width: 150px;">
                  <h5 class="my-3 nome"></h5>
                  <p class="text-muted mb-1 inst"></p>
                  <p class="text-muted mb-4 cidade"></p>
                  <div class="justify-content-center mb-2">
                    <button type="button" class="btn btn-primary">Adicionar</button>
                    <button type="button" class="btn btn-danger">Denunciar</button>
                  </div>
                </div>
              </div>
              <div class="card mb-4 mb-lg-0">
                <div class="card-body p-0">
                  <ul class="list-group list-group-flush rounded-3" id="av">
                    <li class="list-group-item d-flex justify-content-center align-items p-3">
                      <i class="fas fa-globe fa-lg text-warning"></i>
                      <p class="mb-0 text-left"><span class="text-primary font-italic me-1">Avaliações Recentes</span></p>

                    </li>

                  </ul>

                </div>
              </div>
            </div>
            <div class="col-lg-8">
              <div class="card mb-4">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Nome Completo</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0 nome"></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Email</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0 email"></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Idade</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0 data"></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Visto por Ultimo</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0 vpu"></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Cidade</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0 cidade"></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Cargo</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0 cargo"></p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="mb-lg-4">
                <div class="card mb-4 mb-md-0">
                  <div class="card-body">
                    <p class="mb-4"><span class="text-primary font-italic me-1">Biografia</span>

                    </p>
                    <p class="mb-1 biografia"></p>

                  </div>
                </div>
              </div>

              <div class="mb-lg-4">
                <div class="card mb-4 mb-md-0">
                  <div class="card-body">
                    <p class="mb-4"><span class="text-primary font-italic me-1">Principais Posts</span>
                    </p>
                    <table id="table_id" class="display">
                      <thead>
                        <tr>
                          <th>Assunto</th>
                          <th>Data Publicação</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Row 1 Data 1</td>
                          <td>Row 1 Data 2</td>
                        </tr>
                        <tr>
                          <td>Row 2 Data 1</td>
                          <td>Row 2 Data 2</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <div class="mb-lg-4">
                <div class="card mb-4 mb-md-0">
                  <div class="card-body text-left">
                    <div class="row">
                      <div class="col-2">
                        <img class="rounded-circle" src="images/author.jpg" height="90" width="90" alt="Image of woman">
                      </div>
                      <div class="col-10">

                        <div class="comment-box">
                          <p class="mb-0"><span class="text-primary font-italic me-1">Adicionar Avaliação</span>

                          <div class="rating">
                            <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                            <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                            <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                            <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                            <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                          </div>

                          <div class="form-group mb-3">
                            <textarea class="form-control" placeholder="Digite aqui sua Avaliação" id="exampleFormControlTextarea1" rows="4"></textarea>
                          </div>

                          <div class="d-grid gap-2">
                            <button class="btn btn-primary btn-lg btn-block" type="button">Enviar</button>


                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </section>

    </div>


    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
      </svg></div>




    <script src="js/popper.min.js"></script>
    <script src="js/CadastroUsuario.js"></script>
    <script src="js/LoginUsuario.js"></script>
    <script src="js/EditarPerfilUsuario.js"></script>
    <script src="js/ImagemPerfil.js"></script>
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
    <script src="js/main.js"></script>



</body>

</html>