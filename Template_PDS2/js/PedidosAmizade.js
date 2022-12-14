$(".botao-notify").click(function () {

    $.ajax({
        method: 'POST',
        url: 'controller/BuscarSolicitacoesController.php',
        data: {},

        success: function (resposta) {

            $resp = JSON.parse(resposta);

            $resp.forEach(element => {

                $old = document.getElementById('not');
                var newcontent = document.createElement('div');

                newcontent.innerHTML =
                    `<div id="fb" value="` + element.idUsuario + `">
            <div id="fb-top">
                <p><b value="`+ element.idConviteAmizade + `">Solicitação de Amizade</b>
            </div>
            <img src="images/author.jpg" height="100" class="" width="100" alt="Image of woman">
            <p id="info" onclick="paginaTerceiros(`+ element.idUsuario + `)"><b>` + element.nome + `</b> <br> <span  class="dataSolicitacao">` + element.dataConvite + `</p>
                <div id="button-block">
                    <div id="confirm" onclick="confirmarAmizade(`+ element.idConviteAmizade + ` , ` + element.$idUsuario + `)">Confirmar</div>
                    <div id="delete">Excluir</div>
                </div>
            </div>
            <hr>`;

                while (newcontent.firstChild) {
                    $old.appendChild(newcontent.firstChild);
                }

            });
        },
        error: function (resposta) {

        }
    });

    $(".modal-notify").modal();
});

function paginaTerceiros($idUsuario) {
    window.location.replace("PerfilTerceiros.php?user=" + $idUsuario)
}

function confirmarAmizade($idSolicitacao, $idSolicitante) {

    $.ajax({
        method: 'POST',
        url: 'controller/AdicionarAmigoController.php',
        data: {
            usuarioSolicitante: $idSolicitante,
            solicitacao: $idSolicitacao

        },

        success: function (resposta) {
            alert("certo")
        },
        error: function (resposta) {

        }
    });
}

function adicionarUsuario($usuarioSolicitado) {

    if ($(".addUser").text() == "Adicionar") {
        $(".addUser").text('Solicitado')

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
    } else {

        $(".addUser").text('Adicionar')

        $.ajax({
            method: 'POST',
            url: 'controller/CancelarPedidoAmizadeController.php',
            data: {
                usuarioSolicitado: $usuarioSolicitado,
            },

            success: function (resposta) {
                alert(resposta)
            },
            error: function (resposta) {
                alert("erro")
            }
        });
    }
}