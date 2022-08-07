<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //extreaemos de clientes la informacion. y la compaginamos en 4 para mostrarla en pantalla.
        $datos['clientes']=Cliente::paginate(4);
        //Retornamos la vista y los datos
        return view('cliente.index',$datos);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //nos redirige a la vista de crear
        return view('cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Hacemos que los campos sean requeridos con las siguientes especificaciones
        $campos=[
            'Nombre' => 'required|string|max:100',
            'Direccion' => 'required|string|max:100',
            'Telefono' => 'required|string|max:10',
        ];
        //Mensaje con el atributo en el cual no se cumplen las especificaciones
        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];

        //Validamos persé los datos
        $this->validate($request,$campos,$mensaje);

        //Toma todos los datos menos el token
        $datosCliente = request()->except('_token');


        //Inserta los datos del Veterinario
        Cliente::insert($datosCliente);

        //Nos retorna un json con los datos enviados
        //return response()->json($datosCliente);

        return redirect('cliente')->with('mensaje','Cliente agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //buscamos la id que devolvemos del usuario para editar
        $cliente=Cliente::findOrFail($id);
        //Retornamos la vista, y llenamos los campos extraido de nuestra busqueda
        return view('cliente.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Lo mismo en actualizar, los campos tienen las siguientes validaciones
        $campos=[
            'Nombre' => 'required|string|max:100',
            'Direccion' => 'required|string|max:100',
            'Telefono' => 'required|string|max:10',
        ];
        //Mensaje ante falla de validacion
        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];

        //Validamos
        $this->validate($request,$campos,$mensaje);


        //Subimos los datos del cliente
        $datosCliente = request()->except(['_token','_method']);

        //Actualizamos los datos comparando los datos del cliente
        Cliente::where('id','=',$id)->update($datosCliente);

        //Encuentra el cliente persé
        $cliente=Cliente::findOrFail($id);

        //return view('cliente.edit', compact('cliente'));
        return redirect('cliente')->with('mensaje','Cliente Modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //intenta encontrar el cliente dada la id otorgada
        $cliente=Cliente::findOrFail($id);

        //Destruye el cliente seleccionado con la id proporcionada
        Cliente::destroy($id);
        return redirect('cliente')->with('mensaje','Cliente Borrado');
    }
}
