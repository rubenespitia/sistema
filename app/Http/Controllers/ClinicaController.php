<?php

namespace App\Http\Controllers;

use App\Models\Clinica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClinicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Buscamos la informacion de la base de datos llamada clinica 
        $datos['clinicas']=Clinica::paginate(4);
        //devolvemos vista
        return view('clinica.index',$datos);
    }

    public function index2()
    {
        //retornamos al inicio de nuestra pagina
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //redirigimas al php de crear
        return view('clinica.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Son los campos requeridos a verificar
        $campos=[
            'Nombre' => 'required|string|max:100',
            'Direccion' => 'required|string|max:100',
            'Telefono' => 'required|string|max:10',
            'HorarioA' => 'required',
            'HorarioC' => 'required'
        ];
        //Mensaje si los requerimientos de la verificacion no se cumplen
        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];
        //Perse la validacion
        $this->validate($request,$campos,$mensaje);

        //Toma todos los datos menos el token
        $datosClinica = request()->except('_token');


        //Inserta los datos del clinica
        Clinica::insert($datosClinica);

        //Nos retorna un json con los datos enviados
        //return response()->json($datosClinica);
        //Nos redirige a la lista de clinicas, con el mensaje de que se agrega con exito
        return redirect('clinica')->with('mensaje','Clinica agregada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clinica  $clinica
     * @return \Illuminate\Http\Response
     */
    public function show(Clinica $clinica)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clinica  $clinica
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //encontrar la clinica a partir de la id
        $clinica=Clinica::findOrFail($id);
        
        //Retorna la vista de editar, justo con los datos encontrados con la id
        return view('clinica.edit', compact('clinica'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clinica  $clinica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //Opciones de verificacion de campos
        $campos=[
            'Nombre' => 'required|string|max:100',
            'Direccion' => 'required|string|max:100',
            'Telefono' => 'required|string|max:10',
            'HorarioA' => 'required',
            'HorarioC' => 'required'
        ];

        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];

        //Validamos con los campos que nosotros asignamos
        $this->validate($request,$campos,$mensaje);


        //Subimos los datos del clinica 
        $datosClinica = request()->except(['_token','_method']);

        //Donnde la id sea igual que la id otorgada, actualizamos los datos
        Clinica::where('id','=',$id)->update($datosClinica);

        //Encontramos los datos dado la id otorgada
        $clinica=Clinica::findOrFail($id);

        //return view('clinica.edit', compact('clinica'));
        //reglesa la vista, con el mensaje de que fue modificado
        return redirect('clinica')->with('mensaje','Clinica Modificada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clinica  $clinica
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Encontramos la clinica con la id otorgada
        $clinica=Clinica::findOrFail($id);

        //Borramos la clinica con la id encontrada
        Clinica::destroy($id);
        return redirect('clinica')->with('mensaje','Clinica Borrada');
    }
}