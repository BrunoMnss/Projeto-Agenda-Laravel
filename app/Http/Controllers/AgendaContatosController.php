<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdicionarContato;
use App\Http\Requests\EditarContato;
use App\Models\AgendaContatos;
use Illuminate\Http\Request;

class AgendaContatosController extends Controller
{
    protected $agendaContatos;

    public function __construct(AgendaContatos $agendaContatos)
    {
        $this->middleware('auth');
        $this->agendaContatos = $agendaContatos;
    }

    protected function index(Request $request)
    {
        $data=$this->agendaContatos->getAll();
        return view('contatos', compact('data'));
    }

    protected function create(Request $request)
    {
        return view('contatos_criar');
    }

    protected function store(AdicionarContato $request)
    {
        $created=$this->agendaContatos->store($request->validated());
        if(empty($created)){
            return redirect()->back();
        }
        return redirect()->route('contatos.index');
    }

    protected function edit(Request $request, $id)
    {
        $contato=$this->agendaContatos->getContatoById($id);
        return view('contatos_editar', compact('contato'));
    }
    protected function update(EditarContato $request, $id)
    {
        $contato=$this->agendaContatos->updateById($id, $request->validated());
        return redirect()->route('contatos.index');
    }
    protected function delete(Request $request, $id)
    {
        $contato=$this->agendaContatos->deleteById($id);
        return redirect()->route('contatos.index');
    }
}
