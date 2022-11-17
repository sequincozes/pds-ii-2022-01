$nomeUsuario = "";
$biografiaPerfil ="";
$dataPerfil ="";
$cidadePerfil ="";

$(document).ready(function () {});

$('.icon-edit').click(function(){
    var input = document.querySelector("#inputAlterarSenha");
    input.disabled = false;
});

$('#salvarAlteracoes').click(function(e){
    e.preventDefault();

    $camposAlterados = {}
    
    $nome_Perfil = $('input[name=nomePerfil]').val();
    $biografia_perfil = $('textarea[name=biografiaPerfil]').val();
    $data_Perfil = $('input[name=dataPerfil]').val();
    $cidade_Perfil = $('input[name=cidadePerfil]').val();

    if($nomeUsuario != $nome_Perfil){
        $camposAlterados.nome = $nome_Perfil;

    }
    if($biografiaPerfil != $biografia_perfil){
        $camposAlterados.biografia = $biografia_perfil;
    }
    if($dataPerfil != $data_Perfil){
        $camposAlterados.data = $data_Perfil;
    }
    if($cidadePerfil != $cidade_Perfil){
        $camposAlterados.cidade = $cidade_Perfil;
    }

    //var dadosModificados = JSON.stringify(Array.from($camposAlterados.entries()));

    $.ajax({
        method: 'POST',
        url: 'controller/EditarPerfilController.php',

        data: {
            campos:$camposAlterados
        },

        success: function (resposta) {
            console.log(resposta)
        },
        error: function (resposta) {
           
        }
    });

});

function buscarInfo($email){
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
  
        },
        error: function (resposta) {
           
        }
    });
}