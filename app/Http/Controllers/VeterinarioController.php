<?php

namespace App\Http\Controllers;
use App\Models\Clinica;
use App\Models\Veterinario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VeterinarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Veterinarios obtenidos
        $datos['veterinarios']=Veterinario::paginate(4);
        //Devolvemos la vista de veterinarios
        return view('veterinario.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Obtenemos los datos de las clinicas 
        $datos['clinicas']=Clinica::paginate(5);
        return view('veterinario.create', $datos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos=[
            'Nombre' => 'required|string|max:100',
            'Cedula' => 'required|string|max:100',
            'Clinica' => 'required'
        ];

        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request,$campos,$mensaje);

        //Toma todos los datos menos el token
        $datosVeterinario = request()->except('_token');


        //Inserta los datos del Veterinario
        Veterinario::insert($datosVeterinario);

        //Nos retorna un json con los datos enviados
        //return response()->json($datosVeterinario);

        return redirect('veterinario')->with('mensaje','Veterinario agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Veterinario  $veterinario
     * @return \Illuminate\Http\Response
     */
    public function show(Veterinario $veterinario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Veterinario  $veterinario
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $veterinario=Veterinario::findOrFail($id);
        $datos['clinicas']=Clinica::paginate(50);
        return view('veterinario.edit', compact('veterinario'),$datos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Veterinario  $veterinario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'Nombre' => 'required|string|max:100',
            'Cedula' => 'required|string|max:100',
            'Clinica' => 'required'
            
        ];

        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];


        $this->validate($request,$campos,$mensaje);


        //Subimos los datos del veterinario 
        $datosVeterinario = request()->except(['_token','_method']);


        Veterinario::where('id','=',$id)->update($datosVeterinario);

        $veterinario=Veterinario::findOrFail($id);

        //return view('veterinario.edit', compact('veterinario'));
        return redirect('veterinario')->with('mensaje','Veterinario Modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Veterinario  $veterinario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $veterinario=Veterinario::findOrFail($id);

        Veterinario::destroy($id);
        return redirect('veterinario')->with('mensaje','Veterinario Borrado');
    }
}
