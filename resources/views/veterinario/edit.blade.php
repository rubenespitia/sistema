@extends('layouts.app')
@section('content')
<div class="container">

<br>
<form action="{{ url('/veterinario/'.$veterinario->id) }}" method="post" enctype="multipart/form-data">
@csrf

{{ method_field('PATCH') }}

@include('veterinario.form',['modo'=>'Editar'])

</form>

</div>
@endsection