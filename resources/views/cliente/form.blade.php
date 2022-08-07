<h1> {{$modo}} cliente </h1>
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
<input type="text" class="form-control" name="Nombre" value="{{ isset($cliente->Nombre)?$cliente->Nombre:old('Nombre') }}" id="Nombre">
<br>
</div>

<div class="form-group"> 
<label for="Direccion"> Direccion </label>
<input type="text" class="form-control" name="Direccion" value="{{ isset($cliente->Direccion)?$cliente->Direccion:old('Direccion') }}" id="Direccion">
<br>
</div>

<div class="form-group"> 
<label for="Telefono"> Telefono </label>
<input type="text" class="form-control" name="Telefono" value="{{ isset($cliente->Telefono)?$cliente->Telefono:old('Telefono') }}" id="Telefono">
<br>
</div>

<input class="btn btn-success" type="submit" value="{{ $modo }} Datos">

<a class="btn btn-primary" href="{{ url('cliente/') }}"> Regresar</a>

<br>