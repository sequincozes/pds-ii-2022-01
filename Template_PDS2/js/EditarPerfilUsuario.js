$nomeUsuario = "";
$biografiaPerfil = "";
$dataPerfil = "";
$cidadePerfil = "";
$senhaPerfil = "";
$emailPefil = "";
$idInstituicao = "";

$(document).ready(function () { });

$('.icon-edit').click(function () {
    var input = document.querySelector("#inputAlterarSenha");
    input.disabled = false;
});

$('#botaoAlteracoes').click(function (e) {
    e.preventDefault();

    $camposAlterados = {}

    $nome_Perfil = $('input[name=nomePerfil]').val();
    $biografia_perfil = $('textarea[name=biografiaPerfil]').val();
    $data_Perfil = $('input[name=dataPerfil]').val();
    $cidade_Perfil = $('input[name=cidadePerfil]').val();
    $senha_perfil = $('input[name=senhaPerfil]').val();

    $select = document.getElementById("selectInstituicao");
    $instituicao_user = $select.options[$select.selectedIndex].value;

    if (!$nome_Perfil || !$data_Perfil || !$cidade_Perfil) {
        $erro = document.querySelector('.alert-alt');
        $erro.textContent = "Preencha todos os campos obrigatórios";

        exibir();

    } else {

        if ($nomeUsuario != $nome_Perfil) {
            $camposAlterados.nome = $nome_Perfil;
        }
        if ($nomeUsuario != $nome_Perfil) {
            $camposAlterados.nome = $nome_Perfil;
        }
        if ($biografiaPerfil != $biografia_perfil) {
            $camposAlterados.biografia = $biografia_perfil;
        }
        if ($dataPerfil != $data_Perfil) {
            $camposAlterados.data = $data_Perfil;
        }
        if ($cidadePerfil != $cidade_Perfil) {
            $camposAlterados.cidade = $cidade_Perfil;
        }
        if ($senha_perfil) {
            $camposAlterados.senha = $senha_perfil;
        }
        if ($instituicao_user) {
            $camposAlterados.inst = $instituicao_user ;
        }

        $camposAlterados.email = $emailPerfil;

        $.ajax({
            method: 'POST',
            url: 'controller/EditarPerfilController.php',

            data: {
                campos: $camposAlterados,
            },

            success: function (resposta) {
                console.log(resposta)

                if (resposta == "Senha Invalida") {
                    $erro = document.querySelector('.alert-alt');
                    $erro.textContent = "Sua senha não corresponde aos nossos critérios de segurança";

                    exibir();
                } else {
     
                     window.location.replace("PerfilUsuario.php");

                }
            },
            error: function (resposta) {

            }
        });

    }

});


function buscarInfo($email) {
    event.preventDefault();
    $email_user = $email;

    $.ajax({
        method: 'POST',
        url: 'controller/BuscarInfoUsuariosController.php',
        data: {
            email: $email_user,
        },

        success: function (resposta) {

            $dados = JSON.parse(resposta);
            document.getElementsByName('emailPerfil')[0].value = $email_user;
            document.getElementsByName('nomePerfil')[0].value = $dados.nome;
            $nomeUsuario = $dados.nome;
            document.getElementsByName('biografiaPerfil')[0].value = $dados.biografia;
            $biografiaPerfil = $dados.biografia;
            document.getElementsByName('dataPerfil')[0].value = $dados.dataNascimento;
            $dataPerfil = $dados.dataNascimento;
            document.getElementsByName('cidadePerfil')[0].value = $dados.cidade;
            $cidadePerfil = $dados.cidade;
            $senhaPerfil = $dados.senha;
            $emailPerfil = $dados.email;
            $dataExib = $dados.dataE;

        },
        error: function (resposta) {

        }
    });
}

function exibir() {
    $('.alert-alt').css('display', 'block');
}