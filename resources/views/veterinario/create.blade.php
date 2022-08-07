@extends('layouts.app')
@section('content')
<div class="container">

<br>
<form action="{{ url('/veterinario') }}" method="post" enctype="multipart/form-data">
@csrf
@include('veterinario.form',['modo'=>'Registrar'])

</form>
</div>
@endsection