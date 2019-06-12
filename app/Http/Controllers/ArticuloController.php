<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Articulo; //Esto hace referencia al modelo categoria que esta en app/Categoria.php

use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Input;

use App\Http\Requests\ArticuloFormRequest;

use DB;

class ArticuloController extends Controller
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
            $articulos = DB::table('articulo as a')
            ->join('categoria as c','a.idcategoria','=','c.idcategoria')
            ->select('a.idarticulo','a.nombre','a.codigo','a.stock','c.nombre as categoria','a.descripcion','a.imagen','a.estado')
            ->where('a.nombre','LIKE','%'.$query.'%')
            ->orwhere('a.codigo','LIKE','%'.$query.'%')
            ->orderBy('a.idcategoria','desc')
            ->paginate(7);
            return view('almacen.articulo.index',["articulos"=>$articulos,"searchText"=>$query]);

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$categorias=DB::table('categoria')->where('condicion','=','1')->get();
        return view('almacen.articulo.create',["categorias"=>$categorias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticuloFormRequest $request)
    {
        $articulo = new Articulo();
        $articulo->idcategoria=$request->get('idcategoria');
        $articulo->codigo=$request->get('codigo');
        $articulo->nombre=$request->get('nombre');
        $articulo->stock=$request->get('stock');
        $articulo->descripcion=$request->get('descripcion');
        $articulo->estado='Activo';

        if (Input::hasFile('imagen')){
        	$file=Input::file('imagen');
        	$file->move(public_path().'/imagenes/articulos/',$file->getClientOriginalName());
        	$articulo->imagen=$file->getClientOriginalName();
        }

        
        $articulo->save();
        return Redirect::to('almacen/articulo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('almacen.articulo.show', ["articulo"=>Articulo::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$articulo=Articulo::findOrFail($id);
    	$categoria=DB::table('categoria')->where('condicion','=','1')->get();
        return view('almacen.articulo.edit', ["articulo"=>$articulo,"categoria"=>$categoria]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticuloFormRequest $request, $id)
    {
        $articulo=Articulo::findOrFail($id);
        $articulo->idcategoria=$request->get('idcategoria');
        $articulo->codigo=$request->get('codigo');
        $articulo->nombre=$request->get('nombre');
        $articulo->stock=$request->get('stock');
        $articulo->descripcion=$request->get('descripcion');
        

        if (Input::hasFile('imagen')){
        	$file=Input::file('imagen');
        	$file->move(public_path().'/imagenes/articulos/',$file->getClientOriginalName());
        	$articulo->imagen=$file->getClientOriginalName();
        }
        $articulo->update();
        return Redirect::to('almacen/articulo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $articulo=articulo::findOrFail($id);
        $articulo->estado='Inactivo';
        $articulo->update();
        return Redirect::to('almacen/articulo');

    }
}
