<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'categoria_id', 'nome', 'preco', 'composicao_id', 'tamanho', 'quantidade', 'imagem1', 'imagem2', 'imagem3'];

    public function rules(){
        return [
            'id' => 'required|unique:produtos,id'.$this->id,
            'categoria_id',
            'nome' => 'required|max:30',
            'preco' => 'required',
            'composicao_id' => 'required',
            'tamanho' => 'required',
            'quantidade' => 'required',
            'imagem1' => 'file|mimes:jpeg',
            'imagem2' => 'file|mimes:jpeg',
            'imagem3' => 'file|mimes:jpeg',
        ];
    }

    public function message(){
        return [
            'required' => 'Field :attribute is required',
            'mimes' => 'Must be jpeg',
            'max' => 'Max 30 caracteres'
        ];
    }

    public function categoria(){
        return $this->belongsTo('App\Models\Categoria');
    }

    public function composicao(){
        return $this->belongsTo('App\Models\Composicao');
    }

}
