$('.addAv').click(function(){
    
    $avaliacao = $('.avaliacao').val()
    $avaliado = $('.idAvaliado').val()
    

    if(!document.querySelector("input[name='rating']:checked")){
        alert("Por favor, avalie o usuário por meio das estrelas")
    }
    else{
        $score = document.querySelector("input[name='rating']:checked").value

        $.ajax({
            method: 'POST',
            url: 'controller/AdicionarAvaliacaoControler.php',
            data: {
                avaliacao: $avaliacao,
                avaliado: $avaliado,
                score: $score
            },
    
            success: function (resposta) {
                window.location.reload()
            },
            error: function (resposta) {
                
            }
        });
        
    }

})