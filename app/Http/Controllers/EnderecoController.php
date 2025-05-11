<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use App\Models\Cidade;
use Illuminate\Http\Request;

class EnderecoController extends Controller
{
    public function index()
    {
        $enderecos = Endereco::with('cidade')->get();
        return view('enderecos.index', compact('enderecos'));
    }

    public function create()
    {
        $cidades = Cidade::orderBy('nome')->get();
        return view('enderecos.create', compact('cidades'));
    }

    public function store(Request $request)
    {
        // 1. Primeiro, vamos debugar o que está chegando
        logger()->info('Dados recebidos no request:', $request->all());
        
        // 2. Validação (como você já tinha)
        $validated = $request->validate([
            'descricao' => 'required|string|max:255',
            'rua' => 'required|string|max:255',
            'numero' => 'required|string|max:20',
            'bairro' => 'required|string|max:255',
            'cidade_id' => 'required|exists:cidades,id',
        ]);
    
        // 3. Verifique os dados validados
        logger()->info('Dados após validação:', $validated);
    
        try {
            // 4. Crie o endereço de forma explícita para melhor controle
            $endereco = new Endereco();
            $endereco->descricao = $validated['descricao'];
            $endereco->rua = $validated['rua']; // Garantindo que o campo rua está sendo setado
            $endereco->numero = $validated['numero'];
            $endereco->bairro = $validated['bairro'];
            $endereco->cidade_id = $validated['cidade_id'];
            $endereco->cliente_id = 1; // Temporário para testes
            $endereco->save();
    
            // 5. Log de sucesso
            logger()->info('Endereço criado com ID: ' . $endereco->id);
    
            return redirect()->route('admin.enderecos.index')
                           ->with('success', 'Endereço cadastrado com sucesso!');
            
        } catch (\Exception $e) {
            // 6. Log de erro detalhado
            logger()->error('Erro ao criar endereço: ' . $e->getMessage());
            
            return back()->withInput()
                        ->with('error', 'Erro ao cadastrar: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $endereco = Endereco::findOrFail($id);
        $cidades = Cidade::orderBy('nome')->get();
        return view('enderecos.edit', compact('endereco', 'cidades'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'descricao' => 'required|string|max:255',
            'rua' => 'required|string|max:255',
            'numero' => 'required|string|max:20',
            'bairro' => 'required|string|max:255',
            'cidade_id' => 'required|exists:cidades,id',
        ]);

        Endereco::findOrFail($id)->update($validated);

        return redirect()->route('admin.enderecos.index')->with('success', 'Endereço atualizado com sucesso!');
    }

    public function destroy($id)
    {
        Endereco::findOrFail($id)->delete();
        return redirect()->route('admin.enderecos.index')->with('success', 'Endereço removido com sucesso!');
    }
}