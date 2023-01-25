$id = null;

function listarAmigos($idUser) {

    $.ajax({
        method: 'POST',
        url: 'controller/ListaAmigosController.php',
        data: {
            idUsuario: $idUser
        },

        success: function (resposta) {
    
            $resp = JSON.parse(resposta);
      
            if ($resp.direita) {
                $resp.direita.forEach(element => {

                    $old = document.getElementById('listaAm');
                    var newcontent = document.createElement('div');

                    newcontent.innerHTML = `
    
                    <div class="col-lg-4 mb-4" id="`+ element.idUsuario + `">
                    <div class="row">
                    <div onclick="javascript:location.href='PerfilTerceiros.php?user=`+ element.idUsuario + `'">
                        <div class="col-md-12">
                            <img src="https://www.wrappixel.com/demos/ui-kit/wrapkit/assets/images/team/t1.jpg" alt="wrapkit" class="img-fluid" />
                            <h5 class="mt-4 font-weight-medium mb-2">`+ element.nome + `</h5>
                                <h6 class="subtitle">`+ element.cidade + `</h6>
                                <p> Amigos desde: `+ element.dataAmizade + `</p>
                            </div>
                    </div>
                        <div class="col-md-12">
                            <div class="pt-2">
                                 </div>
                                    <ul class="list-inline">
                                        <li class="list-inline-item"><a href="#" class="text-decoration-none d-block px-1"><i class="icon-twitter"></i></a></li>
                                        <li class="list-inline-item"><a href="#" class="text-decoration-none d-block px-1"><i class="icon-instagram"></i></a></li>
                                        <li class="list-inline-item" onclick="abrirModal(`+ element.fk_amigo1 + `)"><a class="text-decoration-none d-block px-1"><i class="icon-trash"></i></a></li>
                                    </ul>
    
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Confirmação</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                 <span aria-hidden="true">&times;</span>
                                          </button>
                                            </div>
                                            <div class="modal-body">
                                                Deseja realmente excluir este usuário ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                                                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="removerAmizade()">Sim</button>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <!-- Row -->
                    </div>
                    </div>`;


                    while (newcontent.firstChild) {
                        $old.appendChild(newcontent.firstChild);
                    }

                });
            }
            if ($resp.esquerda) {


                $resp.esquerda.forEach(element => {

                    $old = document.getElementById('listaAm');
                    var newcontent = document.createElement('div');

                    newcontent.innerHTML = `
    
                    <div class="col-lg-4 mb-4" id="`+ element.idUsuario + `">
        
                    <div class="row">
                    <div onclick="javascript:location.href='PerfilTerceiros.php?user=`+ element.idUsuario + `'">
                        <div class="col-md-12">
                            <img src="https://www.wrappixel.com/demos/ui-kit/wrapkit/assets/images/team/t1.jpg" alt="wrapkit" class="img-fluid" />
                            <h5 class="mt-4 font-weight-medium mb-2">`+ element.nome + `</h5>
                                <h6 class="subtitle">`+ element.cidade + `</h6>
                                <p> Amigos desde: `+ element.dataAmizade + `</p>
                            </div>
                    </div>
                        <div class="col-md-12">
                            <div class="pt-2">
                                 </div>
                                    <ul class="list-inline">
                                        <li class="list-inline-item"><a href="#" class="text-decoration-none d-block px-1"><i class="icon-twitter"></i></a></li>
                                        <li class="list-inline-item"><a href="#" class="text-decoration-none d-block px-1"><i class="icon-instagram"></i></a></li>
                                        <li class="list-inline-item" onclick="abrirModal(`+ element.fk_amigo2 + `)"><a class="text-decoration-none d-block px-1"><i class="icon-trash"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Row -->
                    </div>
                    </div>`+
                    `<!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Confirmação</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                      </button>
                        </div>
                        <div class="modal-body">
                            Deseja realmente excluir este usuário ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="removerAmizade()">Sim</button>
                        </div>
                        </div>
                    </div>
                    </div>`;


                    while (newcontent.firstChild) {
                        $old.appendChild(newcontent.firstChild);
                    }

                });

            }

        },
        error: function (resposta) {

        }


    });
    

}

function abrirModal($idU) {
    $('#exampleModal').modal();
    $id = $idU;
}

function removerAmizade() {
    event.preventDefault();

    $.ajax({
        method: 'POST',
        url: 'controller/RemoverAmizadeController.php',
        data: {
            fk_amigo2: $id,
        },

        success: function (resposta) {
            $("#"+$id).remove()
            $("#table_id").remove()
            
        },
        error: function (resposta) {
            alert("erro")
        }
    });
}
