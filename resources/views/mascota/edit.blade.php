@extends('layouts.app')
@section('content')
<div class="container">

<br>
<form action="{{ url('/mascota/'.$mascota->id) }}" method="post" enctype="multipart/form-data">
@csrf

{{ method_field('PATCH') }}

@include('mascota.form',['modo'=>'Editar'])

</form>

</div>
@endsection