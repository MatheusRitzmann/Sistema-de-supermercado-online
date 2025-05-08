<?php

namespace App\Http\Controllers;
 use Illuminate\Http\Request;
 use App\Models\Produto;
 use App\Models\Cliente;
 use App\Models\Endereco;
 use App\Models\Venda;
 use Illuminate\Support\Facades\DB;

 class VendaController extends Controller
 {
    function cadastrar()
    {
        return view('vendas.create');
    }

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
                 'valor_total' => 0, // será atualizado depois
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
 
             return response()->json(['message' => 'Venda cadastrada com sucesso!', 'venda' => $venda], 201);
         } catch (\Exception $e) {
             DB::rollback();
             return response()->json(['error' => 'Erro ao cadastrar a venda', 'details' => $e->getMessage()], 500);
         }
     }
 }
