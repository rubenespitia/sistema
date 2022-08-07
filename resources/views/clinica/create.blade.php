@extends('layouts.app')
@section('content')
<div class="container">

<br>
<form action="{{ url('/clinica') }}" method="post" enctype="multipart/form-data">
@csrf
@include('clinica.form',['modo'=>'Registrar'])

</form>
</div>
@endsection