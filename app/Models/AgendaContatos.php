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
        return $this->select('id','nome','sobrenome','telefone','email')->where('user_id', auth()->user()->id)->get();
    }
    public function getContatoById($id){
        return $this->select('id','nome','sobrenome','telefone','email')->where('user_id', auth()->user()->id)->where('id', $id)->first();
    }
    public function updateById($id,$data){
        return $this->where('id', $id)->update($data);
    }
    public function deleteById($id){
        return $this->where('id', $id)->delete();
    }
}
