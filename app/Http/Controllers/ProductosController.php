<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Productos;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = DB::select('select * from productos');
        return view('productos.index', ['productos' => $productos]);
        
    }

    public function notes(Request $request)
    {
        if($request->ajax())
        {
            $notes= $request->notes;
            $productos = DB::table('productos')
            ->select('*')
            ->where('notes', 'like', '' . $notes . '%')
            ->get();
        if($productos){
            return ($productos);
        }
        }  
    }

    public function product_key(Request $request)
    {
        if($request->ajax())
        {
            $product_key= $request->product_key;
            $productos = DB::table('productos')
            ->select('*')
            ->where('product_key', 'like', '' . $product_key . '%')
            ->get();
        if($productos){
            return ($productos);
        }
        }  
    }

    public function product_table(Request $request)
    {
        if($request->ajax())
        {
            //$product_key= $request->product_key;
            $productos = DB::table('productos')
            ->select('*')
            ->get();
        if($productos){
            return ($productos);
        }
        }  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function show(Productos $productos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function edit(Productos $productos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Productos $productos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Productos $productos)
    {
        //
    }
}
