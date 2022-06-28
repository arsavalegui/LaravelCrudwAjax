@extends('layouts.app')

@section('content')

<div class="container">

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Foto</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Equipo/s</th>
                <th>Correo</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach($empleados as $empleado)
            <tr>
                <td>{{$empleado->id}}</td>
                <td>
                <img src="{{ asset('storage/app/public').'/'.$empleado->Foto }}" width="100" alt="">  
                
                </td>
                <td>{{$empleado->Nombre}}</td>
                <td>{{$empleado->ApellidoPaterno}}</td>
                <td>{{$empleado->ApellidoMaterno}}</td>
                <td>{{$empleado->Equipo}}</td>
                <td>{{$empleado->Correo}}</td>
                <td>

                    <br>

                    <a href="{{ url('empleado/') }}"> Regresar </a>

                    <a href="{{ url('/empleado/'.$empleado->id.'/edit') }}"> <!-- Se envia informacion a empleado, se pasa un id y la instruccion sera edit -->
                        Editar
                    </a>

                    <!-- Softdelete -->
                    <form action="{{url('/empleado/'.$empleado->id)}}" method="post">
                        @csrf

                        {{ method_field('DELETE') }}

                        <input type="submit" onclick="return confirm('¿Deseas eliminar?')" value="Borrar">
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>

    </table>   
</div>
@endsection