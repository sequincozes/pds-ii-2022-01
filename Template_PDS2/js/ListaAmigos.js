function listarAmigos($idUser){
    
    $.ajax({
        method: 'POST',
        url: 'controller/ListaAmigosController.php',
        data: {
            idUsuario: $idUser
        },

        success: function (resposta) {

            $resp = JSON.parse(resposta);

            $resp.forEach(element => {

                $old = document.getElementById('listaAm');
                var newcontent = document.createElement('div');

                newcontent.innerHTML = `

                <div class="col-lg-4 mb-4" id="`+ element.idUsuario +`" onclick="javascript:location.href='PerfilTerceiros.php?user=`+ element.idUsuario +`'">
                <div class="row">
                    <div class="col-md-12">
                        <img src="https://www.wrappixel.com/demos/ui-kit/wrapkit/assets/images/team/t1.jpg" alt="wrapkit" class="img-fluid" />
                    </div>
                    <div class="col-md-12">
                        <div class="pt-2">

                            <h5 class="mt-4 font-weight-medium mb-2">`+ element.nome +`</h5>
                            <h6 class="subtitle">`+ element.cidade +`</h6>
                            <p> Amigos desde: `+ element.dataAmizade+`</p>
                             </div>
                                <ul class="list-inline">
                                    <li class="list-inline-item"><a href="#" class="text-decoration-none d-block px-1"><i class="icon-twitter"></i></a></li>
                                    <li class="list-inline-item"><a href="#" class="text-decoration-none d-block px-1"><i class="icon-instagram"></i></a></li>
                                    <li class="list-inline-item" onclick="abrirModal()"><a class="text-decoration-none d-block px-1"><i class="icon-trash"></i></a></li>
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
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                                            <button type="button" class="btn btn-primary" onclick="removerAmizade(`+ element.idAmigos +`)">Sim</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <!-- Row -->
                </div>`;
                    

                while (newcontent.firstChild) {
                    $old.appendChild(newcontent.firstChild);
                }

            });
        },
        error: function (resposta) {

        }
    });

}

function abrirModal(){
    $('#exampleModal').modal();
}

function removerAmizade($id){
    alert($id)
}