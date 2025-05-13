<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use App\Models\Cliente;
use App\Models\Endereco;
use App\Models\Venda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VendaController extends Controller
{
    // Lista todas as vendas
    public function index()
    {
        $vendas = Venda::with(['cliente', 'endereco', 'produtos'])->latest()->get();
        return view('admin.vendas.index', compact('vendas'));
    }

    // Mostra formulário de nova venda
    public function create()
    {
        $clientes = Cliente::all();
        $produtos = Produto::all();
        return view('admin.vendas.create', compact('clientes', 'produtos'));
    }

    // Processa nova venda
    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'endereco_id' => 'required|exists:enderecos,id',
            'produtos' => 'required|array',
            'produtos.*.id' => 'required|exists:produtos,id',
            'produtos.*.quantidade' => 'required|integer|min:1',
        ]);

        DB::beginTransaction();

        try {
            $valorTotal = 0;
            $venda = Venda::create([
                'cliente_id' => $request->cliente_id,
                'endereco_id' => $request->endereco_id,
                'valor_total' => 0,
            ]);

            foreach ($request->produtos as $produtoData) {
                $produto = Produto::findOrFail($produtoData['id']);
                $quantidade = $produtoData['quantidade'];
                $subtotal = $produto->preco * $quantidade;
                $valorTotal += $subtotal;

                $venda->produtos()->attach($produto->id, [
                    'quantidade' => $quantidade,
                    'subtotal' => $subtotal,
                ]);
            }

            $venda->update(['valor_total' => $valorTotal]);
            DB::commit();

            return redirect()->route('admin.vendas.index')
                           ->with('success', 'Venda cadastrada com sucesso!');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Erro ao cadastrar venda: ' . $e->getMessage());
        }
    }

    // Mostra detalhes de uma venda
    public function show(Venda $venda)
    {
        return view('admin.vendas.show', compact('venda'));
    }
}