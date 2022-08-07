<?php

namespace App\Http\Controllers;
use App\Models\Cliente;
use App\Models\Mascota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MascotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Obtiene los datos de la base de datos mascota, y los paginamos para su vista
        $datos['mascotas']=Mascota::paginate(4);
        //Devolvemos la vista de la lista de las mascotas
        return view('mascota.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Obtenemos los datos 
        $datos['clientes']=Cliente::paginate(5);
        //Nos retorna la vista para crear la nueva mascota
        return view('mascota.create', $datos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Campos para hacer una verificacion
        $campos=[
            'Nombre' => 'required|string|max:100',
            'Cliente' => 'required',
            'Especie' => 'required|string|max:100',
            'Edad' => 'required|integer|max:100'
        ];
        //Mensaje si la verificacion resulta negativa
        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];
        //Validamos los datos
        $this->validate($request,$campos,$mensaje);

        //Toma todos los datos menos el token
        $datosMascota = request()->except('_token');


        //Inserta los datos de Mascota
        Mascota::insert($datosMascota);

        //Nos retorna un json con los datos enviados
        //return response()->json($datosMascota);
        //Nos redirige a la pagina principal y nos da un mensaje de confirmacion
        return redirect('mascota')->with('mensaje','Mascota agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function show(Mascota $mascota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Mediante la busqueda de id encontramos mascota
        $mascota=Mascota::findOrFail($id);
        //Extramos los datos de los clientes para poder relacionarl la mascota con un cliente existente
        $datos['clientes']=Cliente::paginate(50);
        //Retornamos la vista junto con los datos de clientes activos para su edicion
        return view('mascota.edit', compact('mascota'),$datos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Campos de verificacion 
        $campos=[
            'Nombre' => 'required|string|max:100',
            'Cliente' => 'required',
            'Especie' => 'required|string|max:100',
            'Edad' => 'required|integer|max:100'
        ];

        //Mensaje de requerimientos incumpliodos
        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];

        //validamos los datos
        $this->validate($request,$campos,$mensaje);


        //Subimos los datos del mascota
        $datosMascota = request()->except(['_token','_method']);

        //Donde se encuentre la id, vamos a hacer una actualizacion 
        Mascota::where('id','=',$id)->update($datosMascota);

        //Encontramos la mascota persé
        $mascota=Mascota::findOrFail($id);

        //return view('mascota.edit', compact('mascota'));
        //nos redirige una vez terminado a la lista de mascota con un mensaje de verificacion
        return redirect('mascota')->with('mensaje','Mascota Modificada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Encontramos con la id la mascota
        $mascota=Mascota::findOrFail($id);

        //Destruimos la mascota con la id otorgada
        Mascota::destroy($id);
        //Redirigimos a la lista, y mandamos un mensaje de confirmacion
        return redirect('mascota')->with('mensaje','Mascota Borrada');

    }
}
