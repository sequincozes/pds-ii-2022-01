$(document).ready(function () {
    $('.fj-date').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true,

    });

    $("#formularioUsuarios").submit(function(e){
        
    
        $var_nome = $('input[name=nome]').val();
        $var_email = $('input[name=email]').val();
        $var_senha = $('input[name=senha]').val();
        $var_cidade = $('input[name=cidade]').val();
        $var_data = $('input[name=dataN]').val();

   

        $.ajax({
            method: 'POST',
            url: 'controller/CadastroUsuarioController.php',
            data: {
          
            },

            success: function () {
                $('input').val("");
                $('.modal').modal('hide');
                
            },

            error: function () {
              
            }
        });

    });

});