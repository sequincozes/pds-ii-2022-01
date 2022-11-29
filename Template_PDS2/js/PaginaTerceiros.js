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
                $html =
                    `<li class="list-group-item d-flex  align-items-center p-3 avaliacoes">` +
                    `<svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                 </svg>
                <p class="mb-0"><a>`+
                    '@' +
                    element.nome
                    + `</a></p>
              </li`;

                $div = document.createElement('div');
                $div.innerHTML = $html;
                $ul = document.getElementById('av');
                $ul.appendChild($div);

            });

            /*for ($i = 0; $i < 5; $i++) {
                $html =
                `<li class="list-group-item d-flex justify-content-between align-items-center p-3 avaliacoes">
                <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                <p class="mb-0"><a>Teste</a></p>
              </li`;

                $div = document.createElement('div');
                $div.innerHTML = $html;
                $ul = document.getElementById('av');
                $ul.appendChild($div);
            }*/





            /*$av = document.querySelector('.avaliacoes');
            $av.insertAdjacentHTML('afterbegin', html);
            $av.insertAdjacentHTML('afterbegin', html);*/

        },

        error: function (resposta) {

        }
    });





}