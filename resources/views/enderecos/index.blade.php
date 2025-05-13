<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            {{ __('Endereços Cadastrados') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="flex justify-between items-center">
                <a href="{{ route('admin.dashboard') }}"
                   class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-600 transition">
                    ← Voltar para o Dashboard
                </a>
                <a href="{{ route('admin.enderecos.create') }}"
                   class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-500 transition">
                    Cadastrar Novo Endereço
                </a>
            </div>

            <div class="overflow-x-auto bg-gray-800 shadow rounded-lg">
                <table class="min-w-full divide-y divide-gray-700">
                    <thead class="bg-gray-700 text-white">
                        <tr>
                            <th class="px-4 py-3 text-left text-sm font-semibold">ID</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold">Descrição</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold">Rua</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold">Número</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold">Bairro</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold">Cidade</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-900 text-gray-100 divide-y divide-gray-700">
                        @forelse($enderecos as $endereco)
                            <tr>
                                <td class="px-4 py-2">{{ $endereco->id }}</td>
                                <td class="px-4 py-2">{{ $endereco->descricao }}</td>
                                <td class="px-4 py-2">{{ $endereco->rua }}</td>
                                <td class="px-4 py-2">{{ $endereco->numero }}</td>
                                <td class="px-4 py-2">{{ $endereco->bairro }}</td>
                                <td class="px-4 py-2">{{ $endereco->cidade->nome ?? '-' }}</td>
                                <td class="px-4 py-2">
                                    <div class="flex gap-2">
                                        <a href="{{ route('admin.enderecos.edit', $endereco->id) }}"
                                           class="bg-yellow-400 text-black px-3 py-1 rounded hover:bg-yellow-300 text-sm">
                                            Editar
                                        </a>
                                        <form action="{{ route('admin.enderecos.destroy', $endereco->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este endereço?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-500 text-sm">
                                                Excluir
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-4 py-4 text-center text-gray-400">
                                    Nenhum endereço cadastrado.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
