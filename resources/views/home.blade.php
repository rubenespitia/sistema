@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div align="center "class="card-header"><img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.'uploads/demo2.jpg'}}" width="100" alt="100">{{ __(' Bienvenido al sistema de Medican!') }} </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Este es el menu principal donde puedes escoger que area del sistema deseas modificar seleccionandolo desde el menú superior o en el acceso rapido de abajo.') }}
                    
                </div>
            </div>
            <td> 
            <table class="table table-light">
                <thead class="thead-light">
                    <tr align="center">
                        <th><a href="{{ url('/clinica') }}">{{ __('Clinicas') }}</a></th>
                        <th><a href="{{ url('/veterinario') }}">{{ __('Veterinarios') }}</a></th>
                        <th><a href="{{ url('/cliente') }}">{{ __('Clientes') }}</a></th>
                        <th><a href="{{ url('/mascota') }}">{{ __('Mascotas') }}</a></th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td><img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.'uploads/demo3.jpg'}}" width="150" alt=""> </td>
                        <td><img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.'uploads/demo4.jpg'}}" width="150" alt=""> </td>
                        <td><img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.'uploads/demo5.jpg'}}" width="150" alt=""> </td>
                        <td><img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.'uploads/demo6.jpg'}}" width="150" alt=""> </td>
                    </tr>
                </tbody>
            </table>
            </td>
        </div>
    </div>
</div>
@endsection
