var _URL = window.URL || window.webkitURL;

//evento al seleccionar la imagen
$("#imagen_url").change(function(e) {
console.log('entra');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('input[name=_token]').val()
        }
    });

    var file, img;

    if ((file = this.files[0])) {
        img = new Image();
        
      //funcio  para cuando se carga la carga la imagen
        img.onload = function() { 
            var canvas = document.createElement('CANVAS'),
            ctx = canvas.getContext('2d'), dataURL;
            canvas.height = this.height;
            canvas.width = this.width;
            ctx.drawImage(this, 0, 0);
            dataURL = canvas.toDataURL(this);    
          // console.log(dataURL);
            //obtenemos la imagen y la mostramos en pantalla
            $('#imagen').val(dataURL);
            $("#list").html('<img class="img-thumbnail"  id="Eimage" src='+ dataURL +'>');
            $('#data').css("display","block");
            //aplicamos el cuadro de recorte a la imagen
            var image = $('#Eimage');
            image.cropper({
            guides: false,
            autoCrop: true,
            autoCropArea: 0.8,
            dragCrop: false,
            mouseWheelZoom: false,
            background: false,
            movable: false,
            zoomable: false,
            zoomOnWheel: false,
            cropBoxResizable: false,
            aspectRatio: 3 / 2,
            highlight:true,
            modal: false,
            });

             //al hacer clic en el boton corte
        $('#data').on('click', function(e) {
            e.preventDefault();

            var corte = image.cropper('getCroppedCanvas');
            $('#recorte').attr('src',corte.toDataURL());
            $('#imagen2').val(corte.toDataURL());
           // console.log(corte.toDataURL());
            //ajax
            // Upload cropped image to server if the browser supports `HTMLCanvasElement.toBlob`
           
image.cropper('getCroppedCanvas').toBlob(function (blob) {
    var array = [];
    var formData = new FormData();
    formData.append('croppedImage', blob);
    var imgcorte = $('#imagen2').val();
    var destino = $('#opciones').val();
    if(destino == '')
    {
        alert('Seleccione una opción de destino por favor.');
        return false;
    }
    console.log(destino);
      $.ajax('/convertir/texto', {
    method: "POST",
    data:  {'imgcorte' : imgcorte}, 
    dataType: "json",
    //    processData: false,
    //contentType: false,
    success: function (data) {
        if(data == '')
        {
            $('#alert').append("<div class='alert alert-danger'>No se obtuvo ningun resultado, revise el area seleccionada e intente de nievo por favor!! </div>");
        }
        $.each( data, function( key, value ) {
            array.push(value);
           //$('#resultado').append("<span style='font-size: 20px;'>"+ value +"</br></span>");
            $('#'+destino).val(value);
   console.log( value );
});
     
    },
    error: function () {
      console.log('Upload error');
    }
  });
});

        //cierre click    
        });

        };

        //para cuando hay error al cargar la imagen
        img.onerror = function() {
            alert( "tipo de archhivo no valido: " + file.type);
            return false;
        };
        //se agrega la imagen a la etiqueta img
        img.src = _URL.createObjectURL(file);
    }
});

//al hacer click en el icono para cargar imagen
$(document).ready(function(){
    $('.btn-imagen').click(function(){
        $('#imagen_url').click();
    });
});