$(".botao-notify").click(function(){
    $(".modal-notify").modal();
});

function adicionarUsuario($usuarioSolicitado) {
    
    if($(".addUser").text() == "Adicionar"){
        $(".addUser").text('Desfazer')

        $.ajax({
            method: 'POST',
            url: 'controller/EnviarPedidoAmizadeController.php',
            data: {
                usuarioSolicitado: $usuarioSolicitado,
                
            },
    
            success: function (resposta) {
                alert("certo")
            },
            error: function (resposta) {
                
            }
        });
    }else{
        $(".addUser").text('Adicionar')
    }
}