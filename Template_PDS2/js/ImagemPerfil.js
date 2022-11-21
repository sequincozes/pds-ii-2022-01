$url = ""

function readURL(input) {
    if (input.files && input.files[0]) {
  
      var reader = new FileReader();
  
      reader.onload = function(e) {
        $('.image-upload-wrap').hide();
  
        $('.file-upload-image').attr('src', e.target.result);
        $('.file-upload-content').show();
  
        $('.image-title').html(input.files[0].name);

        $urlImage = e.target.result;
        $url = $urlImage.slice(23);
      };
  
      reader.readAsDataURL(input.files[0]);

      
  
    } else {
      removeUpload();
    }
  }
  
  function removeUpload() {
    $url = ""

    $('.file-upload-input').replaceWith($('.file-upload-input').clone());
    $('.file-upload-content').hide();
    $('.image-upload-wrap').show();
  }
  $('.image-upload-wrap').bind('dragover', function () {
      $('.image-upload-wrap').addClass('image-dropping');
    });
    $('.image-upload-wrap').bind('dragleave', function () {
      $('.image-upload-wrap').removeClass('image-dropping');
  });

  function inserirBanco(){

    console.log($url)

    if($url){
        $.ajax({
            method: 'POST',
            url: 'controller/EditarImagemPerfilController.php',
    
            data: {
                url:$url
            },
    
            success: function (resposta) {
                console.log(resposta)
               
            },
            error: function (resposta) {
    
            }
        });
        
    }
   
  }