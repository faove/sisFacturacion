<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Persona;

use Illuminate\Support\Facades\Redirect;

use App\Http\Requests\PersonaFormRequest;

use DB;

class ProveedorController extends Controller
{
 public function __construct()
    {
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request)
        {

            $query = trim($request->get('searchText'));
            $personas = DB::table('persona')
            ->where('nombre','LIKE','%'.$query.'%')
            ->where ('tipo_persona','=','Proveedor')
            ->orwhere('num_documento','LIKE','%'.$query.'%')
            ->where ('tipo_persona','=','Proveedor')
            ->orderBy('idpersona','desc')
            ->paginate(7);
            return view('compras.proveedor.index',["personas"=>$personas,"searchText"=>$query]);

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('compras.proveedor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PersonaFormRequest $request)
    {
        $persona = new Persona();
        $persona->tipo_persona='Proveedor';
        $persona->nombre=$request->get('nombre');
        $persona->tipo_documento=$request->get('tipo_documento');
        $persona->direccion=$request->get('direccion');
        $persona->telefono=$request->get('telefono');
        $persona->email=$request->get('email');
      
        $persona->save();
        return Redirect::to('compras/proveedor');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('compras.proveedor.show', ["persona"=>Persona::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('compras.proveedor.edit', ["persona"=>Persona::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PersonaFormRequest $request, $id)
    {
        $persona=Persona::findOrFail($id);
        //$persona->nombre=$request->get('nombre');
        $persona->nombre=$request->get('nombre');
        $persona->tipo_documento=$request->get('tipo_documento');
        $persona->direccion=$request->get('direccion');
        $persona->telefono=$request->get('telefono');
        $persona->email=$request->get('email');
        
        $persona->update();
        return Redirect::to('compras/proveedor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $persona=Persona::findOrFail($id);
        $persona->tipo_persona='Inactivo';
        $persona->update();
        return Redirect::to('compras/proveedor');

    }}
