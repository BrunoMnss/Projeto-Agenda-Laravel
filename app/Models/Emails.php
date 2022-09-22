<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emails extends Model
{
    use HasFactory;
    protected $table= 'contatos_emails';
    protected $fillable= [
        'user_id',
        'contato_id',
        'email',
        'mensagem',
    ]; 

    public function sendemail($data){
        return $this->create($data);
    }
    
}
