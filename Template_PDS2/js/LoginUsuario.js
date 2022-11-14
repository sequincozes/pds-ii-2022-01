var visibilidade = false;

$(document).ready(function () {

    $('.modal').on('hidden.bs.modal', function () {
        $(this).find('input').val('');
        $esc = document.querySelector('.alert-login');
        $esc.style.display = 'none';
        visibilidade = false;
    });

    $("#formularioLogin").submit(function (g) {
        g.preventDefault();
        alert("teste");
    
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
    
                if ($resp.msg == "Usuario Existe") {
                    visibilidade = false;
                    sessao_ativa = true;

                    window.location.replace("about.php");
                }
    
                else if ($resp.msg == "Consulta Vazia") {
    
                    $erro.textContent = "Seu email não está registrado"
    
                    if (visibilidade == false) {
                        exibir();
                    }
    
                }
    
                else if ($resp.msg == "Senha Incorreta") {
                    $erro.textContent = "Senha Incorreta"
    
                    if (visibilidade == false) {
                        exibir();
                    }
                }
    
                else if ($resp.msg == "Email Invalido") {
                    $erro.textContent = "Email Invalido"
    
                    if (visibilidade == false) {
                        exibir();
                    }
                }
    
            },
            error: function (resposta) {
                $erro = document.querySelector('.alert-login');
    
                $erro.textContent = "Ocorreu um erro inesperado, por favor, tente mais tarde !"
                document.querySelector('.alert-login').classList.remove('alert-danger');
                document.querySelector('.alert-login').classList.add('alert-warning');
    
                if (visibilidade == false) {
                    exibir();
                }
            }
        });
    })


});

function exibir() {
    $('.alert-login').css('display', 'block');
    visibilidade = true;
}

function ocultar() {
    $('.alert-login').css('display', 'none');
    visibilidade = false;
}

