@extends('layouts.app')
@section('content')
<div class="container">

 <h1> <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.'uploads/demo3.jpg'}}" width="150" alt=""> Listado de clinicas</h1>

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
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Horario Apertura</th>
            <th>Horario Cierrre</th>
        </tr>
    </thead>

    <tbody>
        @foreach($clinicas as $clinica)
        <tr>
            <td>{{$clinica->id}}</td>
            <td>{{$clinica->Nombre}}</td>
            <td>{{$clinica->Direccion}}</td>
            <td>{{$clinica->Telefono}}</td>
            <td>{{$clinica->HorarioA}}</td>
            <td>{{$clinica->HorarioC}}</td>
            <td>
            <a href="{{url('/clinica/'.$clinica->id.'/edit')}}" class="btn btn-success">
                Editar
            </a>
            | 
            
            <form action="{{ url('/clinica/'.$clinica->id) }}" class="d-inline" method="post">
            @csrf
            {{ method_field('DELETE') }}
            <input type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar" class="btn btn-danger">

            </form>
        
            </td>
        </tr>
        @endforeach
    </tbody>

</table>
{!! $clinicas->links()!!}
</div>
@endsection