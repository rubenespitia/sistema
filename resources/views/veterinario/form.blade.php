<h1> {{$modo}} veterinario </h1>
<br>

@if(count($errors)>0)
    <div class="alert alert-danger" role="alert">
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
    </div>



@endif

<div class="form-group"> 
<label for="Nombre"> Nombre </label>
<input type="text" class="form-control" name="Nombre" value="{{ isset($veterinario->Nombre)?$veterinario->Nombre:old('Nombre') }}" id="Nombre">
<br>
</div>

<div class="form-group"> 
<label for="Cedula"> Cedula </label>
<input type="text" class="form-control" name="Cedula" value="{{ isset($veterinario->Cedula)?$veterinario->Cedula:old('Cedula') }}" id="Cedula">
<br>
</div>



<div class="form-group"> 
<label for="Cedula"> ID de Clinica Afiliada </label>
<select class="form-control" name="Clinica" value="{{ isset($veterinario->Clinica)?$veterinario->Clinica:old('Clinica') }}" id="Clinica">
    @foreach($clinicas as $clinica)
        <option selected="selected" >{{$clinica->id}}</option>
        @endforeach
</select>
</div>
<br>

<input class="btn btn-success" type="submit" value="{{ $modo }} Datos">

<a class="btn btn-primary" href="{{ url('veterinario/') }}"> Regresar</a>

<br>