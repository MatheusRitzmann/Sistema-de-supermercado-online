<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use App\Models\Cidade; // Importando o modelo Cidade
use Illuminate\Http\Request;

class EnderecoController extends Controller
{
    /**
     * Exibe todos os endereços cadastrados.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enderecos = Endereco::all(); // Pega todos os endereços do banco
        return view('enderecos.index', compact('enderecos')); // Retorna para a view com todos os endereços
    }

    /**
     * Exibe o formulário para criação de um novo endereço.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cidades = Cidade::all(); // Pega todas as cidades para a seleção no formulário
        return view('enderecos.create', compact('cidades')); // Retorna para a view 'create' com as cidades
    }

    /**
     * Cria um novo endereço no banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $request->validate([
        'descricao' => 'required|string',
        'rua' => 'required|string',
        'numero' => 'required|string',
        'bairro' => 'required|string',
        'cidade_id' => 'required|exists:cidades,id',
    ]);

    $endereco = new Endereco();
    $endereco->descricao = $request->descricao;
    $endereco->rua = $request->rua;
    $endereco->numero = $request->numero;
    $endereco->bairro = $request->bairro;
    $endereco->cidade_id = $request->cidade_id;

    // Apenas para testes, usar o ID de um cliente que existe no banco
    $endereco->cliente_id = 1;

    $endereco->save();

    return redirect()->route('enderecos.index')->with('success', 'Endereço cadastrado com sucesso!');
}

    /**
     * Exibe o formulário de edição de um endereço.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
{
    $endereco = Endereco::findOrFail($id);
    $cidades = Cidade::all(); // caso você tenha o select de cidades no form

    return view('enderecos.edit', compact('endereco', 'cidades'));
}

    /**
     * Atualiza um endereço no banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'descricao' => 'required|string', // A descrição precisa ser obrigatória
            'rua' => 'required|string', // A rua precisa ser obrigatória
            'numero' => 'required|string', // O número precisa ser obrigatório
            'bairro' => 'required|string', // O bairro precisa ser obrigatório
            'cidade_id' => 'required|exists:cidades,id', // A cidade precisa existir na tabela de cidades
        ]);

        // Encontra o endereço pelo ID
        $endereco = Endereco::find($id);
        $endereco->descricao = $request->descricao;
        $endereco->rua = $request->rua;
        $endereco->numero = $request->numero;
        $endereco->bairro = $request->bairro;
        $endereco->cidade_id = $request->cidade_id;
        $endereco->save(); // Atualiza os dados do endereço

        // Redireciona para a lista de endereços com uma mensagem de sucesso
        return redirect()->route('enderecos.index')->with('success', 'Endereço atualizado com sucesso!');
    }

    /**
     * Remove o endereço do banco de dados.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $endereco = Endereco::find($id);
        $endereco->delete(); // Deleta o endereço do banco

        // Redireciona para a lista de endereços com uma mensagem de sucesso
        return redirect()->route('enderecos.index')->with('success', 'Endereço deletado com sucesso!');
    }
}