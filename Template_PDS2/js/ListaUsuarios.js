function listarUsuarios() {

    $.ajax({
        method: 'POST',
        url: 'controller/ListaUsuariosController.php',
        data: {
        },

        success: function (resposta) {

            $resp = JSON.parse(resposta);

            $resp.forEach(element => {

                $old = document.getElementById('listaUsers');
                var newcontent = document.createElement('div');

                newcontent.innerHTML = `
    
                    <div class="col-lg-4 mb-4" id="`+ element.idUsuario + `">
                    <div class="row">
                    <div onclick="javascript:location.href='PerfilTerceiros.php?user=`+ element.idUsuario + `'">
                        <div class="col-md-12">
                            <img src="https://www.wrappixel.com/demos/ui-kit/wrapkit/assets/images/team/t1.jpg" alt="wrapkit" class="img-fluid" />
                            <h5 class="mt-4 font-weight-medium mb-2">`+ element.nome + `</h5>
                                <h6 class="subtitle">`+ element.cidade + `</h6>
                                <p> Testando </p>
                            </div>
                    </div>
                        <div class="col-md-12">
                            <div class="pt-2">
                                 </div>
                                    <ul class="list-inline">
                                        <li class="list-inline-item"><a href="#" class="text-decoration-none d-block px-1"><i class="icon-twitter"></i></a></li>
                                        <li class="list-inline-item"><a href="#" class="text-decoration-none d-block px-1"><i class="icon-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Row -->
                    </div>
                    </div>`;


                while (newcontent.firstChild) {
                    $old.appendChild(newcontent.firstChild);
                }
            })

        },
        error: function (resposta) {
            console.log("erro")
        }
    })

}