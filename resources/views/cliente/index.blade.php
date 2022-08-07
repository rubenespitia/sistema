@extends('layouts.app')
@section('content')
<div class="container">

<h1><img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.'uploads/demo5.jpg'}}" width="150" alt=""> Listado de Clientes</h1>

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
            <th>Direccion</th>
            <th>Telefono</th>
        </tr>
    </thead>

    <tbody>
        @foreach($clientes as $cliente)
        <tr>
            <td>{{$cliente->id}}</td>
            <td>{{$cliente->Nombre}}</td>
            <td>{{$cliente->Direccion}}</td>
            <td>{{$cliente->Telefono}}</td>
            <td>
            <a href="{{url('/cliente/'.$cliente->id.'/edit')}}" class="btn btn-success">
                Editar
            </a>
            | 
            
            <form action="{{ url('/cliente/'.$cliente->id) }}" class="d-inline" method="post">
            @csrf
            {{ method_field('DELETE') }}
            <input type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar" class="btn btn-danger">

            </form>
        
            </td>
        </tr>
        @endforeach
    </tbody>

</table>
{!! $clientes->links()!!}
</div>
@endsection