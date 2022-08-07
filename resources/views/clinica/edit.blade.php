@extends('layouts.app')
@section('content')
<div class="container">

<br>
<form action="{{ url('/clinica/'.$clinica->id) }}" method="post" enctype="multipart/form-data">
@csrf

{{ method_field('PATCH') }}

@include('clinica.form',['modo'=>'Editar'])

</form>

</div>
@endsection