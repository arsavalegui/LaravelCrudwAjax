@extends('layouts.app')

@section('content')
<div class="container">
    
<!--<form action="{{ url('/empleado') }}" method="post" enctype="multipart/form-data">
    
    @csrf Imprimir llave de seguridad para que laravel responda cada que se mande la informacion al metodo storage por post 

    @include('empleado.form')

</form>-->

    <form action="{{ url('/empleado') }}" method="post" enctype="multipart/form-data">
        @csrf

        <label for="Nombre">Nombre</label>
        <input type="text" name="Nombre" value="{{ isset($empleado->Nombre)?$empleado->Nombre:'' }}" id="Nombre">
        <br>

        <label for="ApellidoPaterno">Apellido Paterno</label>
        <input type="text" name="ApellidoPaterno" value="{{ isset($empleado->ApellidoPaterno)?$empleado->ApellidoPaterno:'' }}" id="ApellidoPaterno">
        <br>

        <label for="ApellidoMaterno">Apellido Materno</label>
        <input type="text" name="ApellidoMaterno" value="{{ isset($empleado->ApellidoMaterno)?$empleado->ApellidoMaterno:'' }}" id="ApellidoMaterno">
        <br>

        <label for="Correo">Correo</label>
        <input type="text" name="Correo" value="{{ isset($empleado->Correo)?$empleado->Correo:'' }}" id="Correo">
        <br>

        @if(isset($empleado->Foto))
        <label for="Foto">Foto</label>
        <img src="{{ asset('storage').'/'.$empleado->Foto }}" width="100" alt="">
        @endif
        <input type="file" name="Foto" id="Foto">
        <br>

        <input type="submit" value="Guardar datos">
        <br>

        <a href="{{ url('empleado/') }}"> Regresar </a>

    </form>

</div>
@endsection

<script src="http://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous">
</script>
<script>
jQuery(document).ready(function(){
    jQuery('#Correo').focusout(function(e){
        e.preventDefault();
        console.log($('meta[name="csrf-token"]').attr('content'));
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
                  url: "{{ url('/empleados/store') }}",
                  type: 'POST',
                  data: {
                     Correo: jQuery('#Correo').val(),
                  },
                  success: function(data){
                    // jQuery('.invalid-feedback').show();
                    // alert('invalid-feedback');
                    //Buscar alerts de bootstrap.

                    if (data.success == false) {
                            $('#Correo').after('<div id="email-error" class="text-danger" <strong>'+data.message[0]+'<strong></div>');
                    } else {
                            $('#Correo').after('<div id="email-error" class="text-success" <strong>'+data.message+'<strong></div>');
                    }


                  }});
               });
            });
</script>
