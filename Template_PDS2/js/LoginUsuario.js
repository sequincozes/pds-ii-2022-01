var visibilidade = false;

$(document).ready(function () {

    $('.modal').on('hidden.bs.modal', function () {
        $(this).find('input').val('');
        $esc = document.querySelector('.alert-login');
        $esc.style.display = 'none';
        visibilidade = false;
      });
 

});

function exibir() {
    $('.alert-login').css('display', 'block');
    visibilidade = true;
}

function ocultar() {
    $('.alert-login').css('display', 'none');
    visibilidade = false;
}


function FormUsuario(){
 
    g.preventDefault();

    $var_email = $('input[name=emailLogin]').val();
    $var_senha = $('input[name=senhaLogin]').val();

    $.ajax({
        method: 'POST',
        url: 'controller/LoginUsuarioController.php',
        data: {
            emailLogin: $var_email,
            senhaLogin: $var_senha
        },

        success: function (resposta) {

            $resp = JSON.parse(resposta);
            $erro = document.querySelector('.alert-login');

            if ($resp == "Usuario Existe") {
                window.location.replace("index.html");
                visibilidade = false;
            }

            else if ($resp == "Consulta Vazia") {

                $erro.textContent = "Seu email não está registrado"

                if(visibilidade == false){
                    exibir();
                }

            }

            else if ($resp == "Senha Incorreta") {
                $erro.textContent = "Senha Incorreta"

                if(visibilidade == false){
                    exibir();
                }
            }

            else if ($resp == "Email Invalido") {
                $erro.textContent = "Email Invalido"

                if(visibilidade == false){
                    exibir();
                }
            }

        },
        error: function (resposta) {
            $erro = document.querySelector('.alert-login');

            $erro.textContent = "Ocorreu um erro inesperado, por favor, tente mais tarde !"
            document.querySelector('.alert-login').classList.remove('alert-danger');
            document.querySelector('.alert-login').classList.add('alert-warning');

            if(visibilidade == false){
                exibir();
            }
        }
    });

}