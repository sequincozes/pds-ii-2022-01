function exibirPagina($id) {

    $.ajax({
        method: 'POST',
        url: 'controller/PerfilTerceirosController.php',
        data: {
            id: $id
        },

        success: function (resposta) {

            $dadosRetorno = JSON.parse(resposta);
            
            $('.nome').text($dadosRetorno.user.nome)
            $('.email').text($dadosRetorno.user.email)
            $('.cidade').text($dadosRetorno.user.cidade)
            $('.biografia').text($dadosRetorno.user.biografia)
            $('.foto').attr('src', $dadosRetorno.user.fotoPerfil)
            $('.tituloPage').text($dadosRetorno.user.nome)

            $ano_atual = new Date().getFullYear();
            $data = $dadosRetorno.user.dataNascimento.split('-')[0]
            $idade = $ano_atual - $data;

            $('.data').text($idade + " anos")

            $date = $dadosRetorno.user.vistoPorUltimo.split(' ')[0]
            $vpu = $date.split('-').reverse().join('/');

            $('.vpu').text($vpu)
            $('.inst').text($dadosRetorno.inst.nome)
            $('.cargo').text($dadosRetorno.inst.cargo)

            $dadosRetorno.avaliacoes.forEach(element => {
                var html =
                    `<li class="list-group-item d-flex  align-items-center p-3 avaliacoes">` +
                    `<svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                 </svg>
                <p class="mb-0 idAvaliacao" value="`+ element.id + `"><a>` +
                    '@' +
                    element.nome
                    + `</a></p>
              </li`;


                $ul = document.getElementById('av');

                var newcontent = document.createElement('div');
                newcontent.innerHTML = `<li class="list-group-item d-flex  align-items-center p-3 avaliacoes" onclick="exibirModal(` + element.idAvaliacoes + `,`+ element.fk_avaliador+`)">` +
                    `<svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
             </svg>
            <p class="mb-0 idAvaliacao" value="`+ element.id + `"><a>` +
                    '@' +
                    element.nome
                    + `</a>
                
                    </p>
                    
              </li`;

                while (newcontent.firstChild) {
                    $ul.appendChild(newcontent.firstChild);
                }


            });

        },

        error: function (resposta) {

        }
    });

}

function exibirHistorico($id){
    $.ajax({
        method: 'POST',
        url: 'controller/HistoricoOrdenadoController.php',
        data: {
            $id: $id,
        },

        success: function (resposta) {
            $dados = JSON.parse(resposta);
            console.log($dados)
 
        },
        error: function (resposta) {
            alert("erro")
        }
    });
}

$(".avaliacoes").click(function () {
    $("#modal-mensagem").modal();
});

function exibirModal($id,$fk_avaliador){

    $("#modal-mensagem").modal();
    exibirAvaliacao($id,$fk_avaliador);
}

function exibirAvaliacao($id,$fk_avaliador) {

    $.ajax({
        method: 'POST',
        url: 'controller/ExibirAvaliacoesController.php',

        data: {
            idAvaliacao: $id,
            avaliador: $fk_avaliador
        },

        success: function (resposta) {

            $resp = JSON.parse(resposta);
            
            $(".avaliador").text($resp.user.nome)
            $(".texto").text($resp.avaliacao.avaliacoes)
            $(".dataAv").text($resp.avaliacao.data.split(" ")[0])

            if($resp.avaliacao.score == 1){
                $("#1s").prop("checked", true);
            }
            else if($resp.avaliacao.score == 2){
                $("#2s").prop("checked", true);
            }
            else if($resp.avaliacao.score == 3){
                $("#3s").prop("checked", true);
            }
            else if($resp.avaliacao.score == 4){
                $("#4s").prop("checked", true);
            }
            else if($resp.avaliacao.score == 5){
                $("#5s").prop("checked", true);
            }

            $(".dis").prop('disabled', true);
 
        },
        error: function (resposta) {
            console.log("Errado")
        }
    });

    
}
