<?php if (session_status() == PHP_SESSION_ACTIVE && $_SESSION["autenticado"] == true) { ?>
        <div class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url(images/bg_6.jpg);" data-stellar-background-ratio="0.5">
          <div class="overlay"></div>
          <div class="js-fullheight d-flex justify-content-center align-items-center">
            <div class="col-md-8 text text-center">
              <img id="imageLogin2" class="img mb-3" src="<?php echo $foto ?>" />

              <div class="desc">
                <?php if (session_status() == PHP_SESSION_ACTIVE && $_SESSION["autenticado"] == true) { ?>
                  <h1 class="mb-3 nomeUser"><?php echo $nome ?></h1>
                  <p class="mb-4 biografia mw-80"><?php echo $biografia ?></p>
                  <ul class="ftco-social mt-3">
                    <li class="ftco-animate"><a data-toggle='modal' type="submit" data-target='#modalEditProfile' onclick="buscarInfo('<?php echo $_SESSION['email'] ?>')"><span class="icon-settings ic" title="Editar Perfil"></span></a></li>
                    <li class="ftco-animate"><a href="#"><span class="icon-twitter ic" title="Twitter"></span></a></li>
                    <li class="ftco-animate"><a href="#"><span class="icon-instagram ic" title="Instagram"></span></a></li>
                    <li class="ftco-animate"><a href="ListaAmigos.php"><span class="icon-person ic " title="Amizades"></span></a></li>
                    <li class="ftco-animate"><a href="#"><span class="icon-bell ic botao-notify" title="Notificações"></span></a></li>

                  </ul>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>

      <?php } ?>