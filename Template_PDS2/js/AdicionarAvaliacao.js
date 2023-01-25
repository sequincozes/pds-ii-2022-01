$('.addAv').click(function(){
    
    $avaliacao = $('.avaliacao').val()
    $avaliado = $('.idAvaliado').val()
    

    if(!document.querySelector("input[name='rating']:checked")){
        $erro = document.querySelector('#alert');
        $erro.textContent = "Avaliação por estrelas é obrigatória"
        $('#alert').css('display','block')
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