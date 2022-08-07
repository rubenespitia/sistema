<h1> {{$modo}} mascota </h1>
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
<input type="text" class="form-control" name="Nombre" value="{{ isset($mascota->Nombre)?$mascota->Nombre:old('Nombre') }}" id="Nombre">
<br>
</div>


<div class="form-group"> 
<label for="Nombre"> #Id de Cliente(Dueño) </label>
<select class="form-control" name="Cliente" value="{{ isset($veterinario->Cliente)?$veterinario->Cliente:old('Cliente') }}" id="Cliente">
    @foreach($clientes as $cliente)
        <option selected="selected" >{{$cliente->id}}</option>
        @endforeach
</select>
</div>
<br>

<div class="form-group"> 
<label for="Especie"> Especie </label>
<select class="form-control" name="Especie" value="{{ isset($mascota->Especie)?$mascota->Especie:old('Especie') }}" id="Especie">
    <option selected="selected" >Perro</option>
    <option selected="selected" >Gato</option>
    <option selected="selected" >Ave</option>
    <option selected="selected" >Caballo</option>
    <option selected="selected" >Pez</option>
    <option selected="selected" >Reptil</option>
</select>
</div>
<br>


<div class="form-group"> 
<label for="Edad"> Edad </label>
<input type="text" class="form-control" name="Edad" value="{{ isset($mascota->Edad)?$mascota->Edad:old('Edad') }}" id="Edad">
<br>
</div>

<input class="btn btn-success" type="submit" value="{{ $modo }} Datos">

<a class="btn btn-primary" href="{{ url('mascota/') }}"> Regresar</a>

<br>