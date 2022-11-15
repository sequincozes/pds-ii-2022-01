$(document).ready(function () {

    $("#formProfileEdit").submit(function (g) {
        g.preventDefault();

        var select = document.getElementById("selectInstituicao");

        $var_instituicao = select.options[select.selectedIndex].value;
        $var_nome = $('input[name=nomePerfil]').val();
        $var_email = $('input[name=emailPerfil]').val();
        $var_senha = $('input[name=senhaPerfil]').val();
        $var_cidade = $('input[name=cidadePerfil]').val();
        $var_data = $('input[name=dataPerfil]').val();


        $.ajax({
            method: 'POST',
            url: '',
            data: {
                nome: $var_nome,
                email: $var_email,
                senha: $var_senha,
                cidade: $var_cidade,
                data: $var_data,
                instituicao: $var_instituicao
            },
    
            success: function (resposta) {
    
                alert("certo")
            },
            error: function (resposta) {
               
            }
        });

    })

});

$('.icon-edit').click(function(){
    var input = document.querySelector("#inputAlterarSenha");
    input.disabled = false;
});