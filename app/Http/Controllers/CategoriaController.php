<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function __construct(Categoria $categoria){
        $this->categoria = $categoria;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = $this->categoria->all();
        return response()->json($categorias, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->categoria->rules(), $this->categoria->message());
        $categoria = $this->categoria->create($request->all());
        return response()->json($categoria, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoria = $this->categoria->find($id);
        if($categoria === null){
            return response()->json(['erro' => 'Categoria not found'], 404);
        }
        return response()->json($categoria, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categoria = $this->categoria->find($id);
        
        if($categoria === null){
            return response()->json(['erro' => 'Categoria not found'], 404);
        }

        if($request->method() === 'PATCH') {
            $dinamicRules = array();
            foreach($categoria->rules() as $input => $regra){
                if(array_key_exists($input, $request->all())){
                    $dinamicRules[$input] = $regra;
                }
            }
        }else {
            $request->validate($this->categoria->rules(), $this->categoria->message());
        }

        $categoria->update($request->all());
        return response()->json($categoria, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = $this->categoria->find($id);
        if($categoria === null){
            return response()->json(['erro' => 'Categoria not found'], 404);
        }
        $categoria->delete();
        return response()->json(['msg' => 'Delete success'], 200);
    }
}
