@extends('layouts.app')
@section('content')
<div class="container">

<br>
<form action="{{ url('/cliente') }}" method="post" enctype="multipart/form-data">
@csrf
@include('cliente.form',['modo'=>'Registrar'])

</form>
</div>
@endsection