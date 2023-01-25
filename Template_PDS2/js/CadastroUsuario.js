var visibilidade = false;

$(document).ready(function () {
   
    //Definição do DatePicker
    $('.fj-date').datepicker({
        format: "dd/mm/yyyy",
        autoclose: true,

    });


    //Limpa o modal formulario quando é fechado(enviado ou não)
    $('.modal').on('hidden.bs.modal', function () {
        $(this).find('input').val('');
        document.getElementById("alert").style.display = "none";
        visibilidade = false;
      });


    //Ajax para cadastro de usuário
    $("#formularioUsuarios").submit(function (e) {

        e.preventDefault();

        $var_nome = $('input[name=nome]').val();
        $var_email = $('input[name=email]').val();
        $var_senha = $('input[name=senha]').val();
        $var_cidade = $('input[name=cidade]').val();
        $var_data = $('input[name=dataN]').val();

        $.ajax({
            method: 'POST',
            url: 'controller/CadastroUsuarioController.php',
            data: {
                nome: $var_nome,
                email: $var_email,
                senha: $var_senha,
                cidade: $var_cidade,
                data: $var_data
            },

            success: function (resposta) {

                //Variavel que recebe a resposta
                $dadosRetorno = JSON.parse(resposta);
                
                $div = document.getElementById("alert");
                $erro = document.querySelector('#alert');

                //Email já esta cadastrado
               if ($dadosRetorno == "Email Duplicado") {
                    $erro.textContent = "O email informado já esta cadastrado"
                     ocultarExibir();
                }
                //Email não passou pelo filtro de validação e é inválido
                else if ($dadosRetorno == "Email Invalido") {
                    $erro.textContent = "O email digitado não é válido"
                    ocultarExibir();
                }
                //Senha não cumpre requisitos regex
                else if($dadosRetorno == "Senha Invalida"){
                    $erro.textContent = "A sua senha não corresponde aos nossos critérios de segurança"
                    ocultarExibir(); 
                }
                //Cadastro foi feito com sucesso
                else{

                   window.location.replace("index.php");
                   visibilidade = false;
                }

            },

            //Erro inesperado
            error: function (resposta) {
                $dadosRetorno = JSON.parse(resposta);
                $erro.textContent = "Ocorreu um erro inesperado, por favor, tente mais tarde !"
                document.getElementById("alert").classList.remove('alert-danger');
                document.getElementById("alert").classList.add('alert-warning');
                ocultarExibir();
            }
        });


        function ocultarExibir() { 
            document.getElementById("alert").style.display = "block";//Exibimos a div..
            visibilidade = true;//Alteramos o valor da variável para true.
            
        }

    });

    /*$('#trocarForm').click(function () { 
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function(){
            document.getElementById("colorlib-main").innerHTML = this.responseText;
        }

        xhttp.open("GET","FormulariosUsuario.html",true);
        xhttp.send();
     });*/
        

});