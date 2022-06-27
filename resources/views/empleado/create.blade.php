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