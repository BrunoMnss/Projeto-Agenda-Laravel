<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgendaContatos extends Model
{
    use HasFactory;
    protected $table= 'agenda_contatos';
    protected $fillable= [
        'user_id',
        'nome',
        'sobrenome',
        'telefone',
        'email'
    ];
    public function store($data){
        return $this->create($data);
    }
    public function getAll(){
        return $this->select('nome','sobrenome','telefone','email')->where('user_id', auth()->user()->id)->get();
    }
}
