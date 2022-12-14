$notif = 0

$(".botao-notify").click(function () {

    if ($notif == 0) {

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
                        `<div id="fb" class="` + element.idConviteAmizade + `">
                            <div id="fb-top">
                                <p><b value="`+ element.idConviteAmizade + `">Solicitação de Amizade</b>
                            </div>
                            <img src="images/author.jpg" height="100" class="" width="100" alt="Image of woman">
                            <p id="info" onclick="paginaTerceiros(`+ element.idUsuario + `)"><b>` + element.nome + `</b> <br> <span  class="dataSolicitacao">` + element.dataConvite + `</p>
                                <div id="button-block">
                                    <div id="confirm" onclick="confirmarAmizade(`+ element.idConviteAmizade + ` , ` + element.idUsuario + `)">Confirmar</div>
                                    <div id="delete" onclick="recusarAmizade(`+ element.idConviteAmizade + `)">Excluir</div>
                                </div>
                                <hr>
                            </div>
                            `;

                    while (newcontent.firstChild) {
                        $old.appendChild(newcontent.firstChild);
                    }

                    $notif = $notif + 1;

                });
            },
            error: function (resposta) {

            }
        });

    }

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

            $("."+$idSolicitacao).remove()

        },
        error: function (resposta) {

        }
    });
}

function recusarAmizade($idSolicitacao) {

     $.ajax({
        method: 'POST',
        url: 'controller/RecusarConviteAmizadeController.php',
        data: {
            solicitacao: $idSolicitacao
        },

        success: function (resposta) {

            $("."+$idSolicitacao).remove()
        },
        error: function (resposta) {

        }
    });

}

function adicionarUsuario($usuarioSolicitado) {

    if ($(".addUser").text() == "Adicionar") {

        $.ajax({
            method: 'POST',
            url: 'controller/EnviarPedidoAmizadeController.php',
            data: {
                usuarioSolicitado: $usuarioSolicitado,
            },

            success: function (resposta) {

            },
            error: function (resposta) {

            }
        });

        $(".addUser").text("Desfazer")

    } else if ($(".addUser").text() == "Desfazer") {

        $.ajax({
            method: 'POST',
            url: 'controller/CancelarPedidoAmizadeController.php',
            data: {
                usuarioSolicitado: $usuarioSolicitado,
            },

            success: function (resposta) {

            },
            error: function (resposta) {
                alert("erro")
            }
        });

        $(".addUser").text("Adicionar")

    } else if ($(".addUser").text() == "Remover") {

        $.ajax({
            method: 'POST',
            url: 'controller/RemoverAmizadeController.php',
            data: {
                fk_amigo2: $usuarioSolicitado,
            },

            success: function (resposta) {

            },
            error: function (resposta) {
                alert("erro")
            }
        });

        $(".addUser").text("Adicionar")
    }
}