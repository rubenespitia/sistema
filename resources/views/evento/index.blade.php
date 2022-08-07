@extends('layouts.app')
@section('content')

<div class="container">

    <div id='agenda'></div>

</div>


<!-- Modal -->
<div class="modal fade" id="evento" tabindex="-1" aria-labelledby="eventoLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="eventoLabel">Datos del evento</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">


        <form id='formulario' action="">
            {!! csrf_field() !!}
        <div class="form-group d-none">
            <label for="id">ID:</label>
            <input type="text" class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="Escribe el titulo del evento">
            <small id="helpId" class="form-text-muted"></small>
        </div>


        <div class="form-group">
            <label for="title">Titulo</label>
            <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="Escribe el titulo del evento">
            <small id="helpId" class="form-text-muted"></small>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
        </div>

        <div class="form-group">
            <label for="start">Dia de Inicio</label>
            <input type="text" class="form-control" name="start" id="start" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text-muted"></small>
        </div>

        <div class="form-group">
            <label for="end">Dia Fin</label>
            <input type="text" class="form-control" name="end" id="end" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text-muted"></small>
        </div>

        </form>  

      </div>

      <div class="modal-footer">

      <button type="button" class="btn btn-success" data-bs-dismiss="modal" id="btnGuardar">Guardar</button>
      <button type="button" class="btn btn-warning" data-bs-dismiss="modal" id="btnModificar">Modificar</button>
      <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="btnEliminar">Eliminar</button>
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>



  @endsection