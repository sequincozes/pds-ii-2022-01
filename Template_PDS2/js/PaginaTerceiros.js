function exibirPagina($id) {

    $.ajax({
        method: 'POST',
        url: 'controller/PerfilTerceirosController.php',
        data: {
            id:$id
        },

        success: function (resposta) {

            $dadosRetorno = JSON.parse(resposta);
            
            $('.nome').text($dadosRetorno.nome)
            $('.email').text($dadosRetorno.email)
            $('.cidade').text($dadosRetorno.cidade)
            $('.data').text($dadosRetorno.dataNascimento)
            $('.biografia').text($dadosRetorno.biografia)
           

        },

        error: function (resposta) {
            
        }
    });


 


}