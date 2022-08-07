<h1> {{$modo}} clinica </h1>
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
<input type="text" class="form-control" name="Nombre" value="{{ isset($clinica->Nombre)?$clinica->Nombre:old('Nombre') }}" id="Nombre">
<br>
</div>

<div class="form-group"> 
<label for="Direccion"> Direccion </label>
<input type="text" class="form-control" name="Direccion" value="{{ isset($clinica->Direccion)?$clinica->Direccion:old('Direccion') }}" id="Direccion">
<br>
</div>

<div class="form-group"> 
<label for="Telefono"> Telefono </label>
<input type="text" class="form-control" name="Telefono" value="{{ isset($clinica->Telefono)?$clinica->Telefono:old('Telefono') }}" id="Telefono">
<br>
</div>

<div class="form-group"> 
<label for="HorarioA"> Horario Apertura </label>
<input type="time" class="form-control" name="HorarioA" value="{{ isset($clinica->HorarioA)?$clinica->HorarioA:old('HorarioA') }}" id="HorarioA">
<br>
</div>

<div class="form-group"> 
<label for="HorarioC"> Horario Cierre </label>
<input type="time" class="form-control" name="HorarioC" value="{{ isset($clinica->HorarioC)?$clinica->HorarioC:old('HorarioC') }}" id="HorarioC">
<br>
</div>

<input class="btn btn-success" type="submit" value="{{ $modo }} Datos">

<a class="btn btn-primary" href="{{ url('clinica/') }}"> Regresar</a>

<br>