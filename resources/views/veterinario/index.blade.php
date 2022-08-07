@extends('layouts.app')
@section('content')
<div class="container">

<h1><img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.'uploads/demo4.jpg'}}" width="150" alt=""> Listado de Veterinarios</h1>

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
            <th>#Id</th>
            <th>Nombre</th>
            <th>Cedula</th>
            <th>Id Clinica</th>
        </tr>
    </thead>

    <tbody>
        @foreach($veterinarios as $veterinario)
        <tr>
            <td>{{$veterinario->id}}</td>
            <td>{{$veterinario->Nombre}}</td>
            <td>{{$veterinario->Cedula}}</td>
            <td>{{$veterinario->Clinica}}</td>
            <td>
            <a href="{{url('/veterinario/'.$veterinario->id.'/edit')}}" class="btn btn-success">
                Editar
            </a>
            | 
            
            <form action="{{ url('/veterinario/'.$veterinario->id) }}" class="d-inline" method="post">
            @csrf
            {{ method_field('DELETE') }}
            <input type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar" class="btn btn-danger">

            </form>
        
            </td>
        </tr>
        @endforeach
    </tbody>

</table>
{!! $veterinarios->links()!!}
</div>
@endsection