<?php

namespace App\Http\Controllers;

use App\Models\Composicao;
use Illuminate\Http\Request;

class ComposicaoController extends Controller
{
    public function __construct(Composicao $composicao){
        $this->composicao = $composicao;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $composicaos = $this->composicao->with('produtos')->get();
        return response()->json($composicaos, 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->composicao->rules(), $this->composicao->message());
        $composicao = $this->composicao->create($request->all());
        return response()->json($composicao, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $composicao = $this->composicao->with('produtos')->find($id);
        if($composicao === null){
            return response()->json(['erro' => 'Composicao not found'], 404);
        }
        return response()->json($composicao, 200);
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
        $composicao = $this->composicao->find($id);
        
        if($composicao === null){
            return response()->json(['erro' => 'Composicao not found'], 404);
        }

        if($request->method() === 'PATCH') {
            $dinamicRules = array();
            foreach($composicao->rules() as $input => $regra){
                if(array_key_exists($input, $request->all())){
                    $dinamicRules[$input] = $regra;
                }
            }
        }else {
            $request->validate($this->composicao->rules(), $this->composicao->message());
        }

        $composicao->update($request->all());
        return response()->json($composicao, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $composicao = $this->composicao->find($id);
        if($composicao === null){
            return response()->json(['erro' => 'Composicao not found'], 404);
        }
        $composicao->delete();
        return response()->json(['msg' => 'Delete success'], 200);
    }
}
