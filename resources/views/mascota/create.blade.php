@extends('layouts.app')
@section('content')
<div class="container">

<br>
<form action="{{ url('/mascota') }}" method="post" enctype="multipart/form-data">
@csrf
@include('mascota.form',['modo'=>'Registrar'])

</form>
</div>
@endsection