@extends('layouts.app')
@section('content')
<div class="container">

<h1><img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.'uploads/demo6.jpg'}}" width="150" alt=""> Listado de Mascotas</h1>

        @if(Session::has('mensaje'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{Session::get('mensaje')}} 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
        </div>
        @endif  


<br><br>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Id Dueño</th>
            <th>Especie</th>
            <th>Edad</th>
        </tr>
    </thead>

    <tbody>
        @foreach($mascotas as $mascota)
        <tr>
            <td>{{$mascota->id}}</td>
            <td>{{$mascota->Nombre}}</td>
            <td>{{$mascota->Cliente}}</td>
            <td>{{$mascota->Especie}}</td>
            <td>{{$mascota->Edad}}</td>
            <td>
            <a href="{{url('/mascota/'.$mascota->id.'/edit')}}" class="btn btn-success">
                Editar
            </a>
            | 
            
            <form action="{{ url('/mascota/'.$mascota->id) }}" class="d-inline" method="post">
            @csrf
            {{ method_field('DELETE') }}
            <input type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar" class="btn btn-danger">

            </form>
        
            </td>
        </tr>
        @endforeach
    </tbody>

</table>
{!! $mascotas->links()!!}
</div>
@endsection