<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdicionarContato;
use App\Http\Requests\EditarContato;
use App\Http\Requests\EnviarEmail;
use App\Mail\SendEmailContato;
use App\Models\AgendaContatos;
use App\Models\Emails;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AgendaContatosController extends Controller
{
    protected $agendaContatos;
    protected $emails;

    public function __construct(AgendaContatos $agendaContatos, Emails $emails)
    {
        $this->middleware('auth');
        $this->agendaContatos = $agendaContatos;
        $this->emails = $emails;
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
    protected function sendEmail(EnviarEmail $request)
    {
        Mail::to($request->input('email'))->send(new SendEmailContato($request->input('mensagem')));
        $contato=$this->emails->sendEmail($request->validated());
        return redirect()->route('contatos.index');
    }
    protected function showSendEmail(Request $request, $id)
    {
        $contato=$this->agendaContatos->getContatoById($id);
        return view('contatos_enviar_email', compact('contato'));
    }
}
