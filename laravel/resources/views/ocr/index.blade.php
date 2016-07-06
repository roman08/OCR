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
                    <input type="file" id='imagen_url' style="display: none;">
                    
                    <a href="javascript:void(0);" class="btn btn-success btn-imagen" id="btn-imagen-icono" title="Click para asociar imagen">
                        <i id="i" class="fa fa-image fa-5x"></i>
                    </a>                
                   {!! Form::label('Imagen capturada')!!}
                    <div id="list">
                    </div>

                    {!! Form::submit('Recortar', array('style' =>'display: none','class' => 'btn btn-primary', 'id' => 'data')) !!}
                </div><!-- cierre div capturar imagen -->
                <div class="col-md-6">
                    
                         {!! Form::label('Destino del texto extraido')!!}
                    <select name="opciones" id="opciones" class="form-control">
                        <option value="">Seleccione una opción</option>
                        <option value="texto">texto</option>
                        <option value="texto2">texto2</option>
                        <option value="texto3">texto3</option>
                    </select>
                    {!! Form::label('Texto')!!}
                    {!! Form::text('texto',null,['class' => 'form-control', 'id' => 'texto', 'placeholder' => 'texto'])  !!}

                    {!! Form::label('Texto2')!!}
                    {!! Form::text('texto2',null,['class' => 'form-control', 'id' => 'texto2', 'placeholder' => 'texto2'])  !!}

                    {!! Form::label('Texto3')!!}
                    {!! Form::text('texto3',null,['class' => 'form-control', 'id' => 'texto3', 'placeholder' => 'texto3'])  !!}
                    <div id="alert"></div>
                </div>
                
                
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




