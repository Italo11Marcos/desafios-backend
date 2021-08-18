<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = ['nome'];

    public function rules(){
        return [
            'nome' => 'required|unique:categorias,nome,'.$this->id.'|max:30'
        ];
    }

    public function message(){
        return [
            'required' => 'Field :attribute is required',
            'unique' => 'Nome already exists',
            'max' => 'Max 30 caracteres'
        ];
    }

    public function Produtos()
    {
        return $this->hasMany('App\Models\Produto');
    }
}
