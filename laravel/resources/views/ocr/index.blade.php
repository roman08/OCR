<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>OCR PARA OBTENER TEXTO DE IMAGENES</title>
    <!-- stylos -->
    {!! Html::style('/css/base.css') !!}
    {!! Html::style('/css/cropper.css') !!}
</head>
<body>
    {!! csrf_field() !!}

<div class="container">
    <div class="row row-centered">
        <div class="panel panel-default">
            <div class="panel-heading">Editor de Imagen</div>
            <div class="panel-body">
                <div class="col-md-6">
                    <input type="file" id='imagen_url'>
                </div>
                <div class="col-md-6">
                    {!! Form::submit('Recortar', array('style' =>'display: none','class' => 'btn btn-primary', 'id' => 'data')) !!}

                    <div id="list">
                    </div>
                </div>
                {!! Form::label('Resultado: ') !!}
                <div id="resultado"></div>
                {!!Form::hidden('imagen',null,['id'=>'imagen2'])!!}
            </div>
        </div>
    </div>
</div>    
<!-- scripts -->
<script type="text/javascript" src="/js/base.js"></script>
<script type="text/javascript" src="/js/cropper.js"></script>
<script type="text/javascript" src="/js/imagen.js"></script>

</body>
</html>




