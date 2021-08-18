<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function __construct(Produto $produto){
        $this->produto = $produto;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = $this->produto->with('categoria')->get();
        return response()->json($produtos, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->produto->rules(), $this->produto->message());

        $imagem1 = $request->file('imagem1');
        $imagem2 = $request->file('imagem2');
        $imagem3 = $request->file('imagem3');
        
        if($imagem1){
            $imagem1 = $imagem1->store('imagem1', 'public');
        }
        if($imagem2){
            $imagem2 = $imagem2->store('imagem2', 'public');
        }
        if($imagem3){
            $imagem3 = $imagem3->store('imagem3', 'public');
        }

        $produto = $this->produto->create([
            'id' => $request->id,
            'categoria_id' => $request->categoria_id,
            'nome' => $request->nome,
            'preco' => $request->preco,
            'composicao_id' => $request->composicao_id,
            'tamanho' => $request->tamanho,
            'quantidade' => $request->quantidade,
            'imagem1' => $request->imagem1,
            'imagem2' => $request->imagem2,
            'imagem3' => $request->imagem3, 
        ]);

        return response()->json($produto, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = $this->produto->with('produto')->find($id);

        if($produto === null){
            return response()->json(['erro' => 'Produto not found'], 404);
        }
        return response()->json($produto, 200);
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
        $produto = $this->produto->find($id);
        
        if($produto === null){
            return response()->json(['erro' => 'produto not found'], 404);
        }

        if($request->method() === 'PATCH') {
            $dinamicRules = array();
            foreach($produto->rules() as $input => $regra){
                if(array_key_exists($input, $request->all())){
                    $dinamicRules[$input] = $regra;
                }
            }
        }else {
            $request->validate($this->produto->rules(), $this->produto->message());
        }

        if($request->file('imagem1')){
            Storage::disk('public')->delete($produto->imagem1);
            $imagem1 = $request->file('imagem1');
        }
        if($request->file('imagem2')){
            Storage::disk('public')->delete($produto->imagem2);
            $imagem2 = $request->file('imagem2');
        }
        if($request->file('imagem3')){
            Storage::disk('public')->delete($produto->imagem3);
            $imagem3 = $request->file('imagem3');
        }
        
        if($imagem1){
            $imagem1 = $imagem1->store('imagem1', 'public');
            $produto = $this->produto->update([
                'imagem1' => $imagem1
            ]);
        }
        if($imagem2){
            $imagem2 = $imagem2->store('imagem2', 'public');
            $produto = $this->produto->update([
                'imagem2' => $imagem2
            ]);
        }
        if($imagem3){
            $imagem3 = $imagem3->store('imagem3', 'public');
            $produto = $this->produto->update([
                'imagem3' => $imagem3
            ]);
        }

        $produto->update($request->all());
        return response()->json($produto, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = $this->produto->find($id);

        if($request->file('imagem1')){
            Storage::disk('public')->delete($produto->imagem1);
        }
        if($request->file('imagem2')){
            Storage::disk('public')->delete($produto->imagem2);
        }
        if($request->file('imagem3')){
            Storage::disk('public')->delete($produto->imagem3);
        }
        
        if($produto === null){
            return response()->json(['erro' => 'Produto not found'], 404);
        }
        $produto->delete();
        return response()->json(['msg' => 'Delete success'], 200);
    }
}
