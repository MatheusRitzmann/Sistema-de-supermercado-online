<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Minha Loja</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col items-center justify-center p-4">
        <div class="w-full max-w-md bg-white rounded-lg shadow-md overflow-hidden">
            <!-- Cabeçalho -->
            <div class="bg-indigo-600 py-4 px-6">
                <div class="flex items-center justify-between">
                    <h1 class="text-2xl font-bold text-white">Crie sua conta</h1>
                    <a href="{{ route('login') }}" class="text-indigo-200 hover:text-white text-sm">
                        Já tem conta? <span class="font-semibold">Entrar</span>
                    </a>
                </div>
            </div>

            <!-- Formulário -->
            <form method="POST" action="{{ route('register') }}" class="p-6 space-y-6">
                @csrf

                <!-- Logo -->
                <div class="flex justify-center mb-6">
                    <div class="w-20 h-20 bg-indigo-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-store text-indigo-600 text-3xl"></i>
                    </div>
                </div>

                <!-- Nome -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nome Completo</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-user text-gray-400"></i>
                        </div>
                        <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus
                            class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Seu nome">
                    </div>
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">E-mail</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-gray-400"></i>
                        </div>
                        <input id="email" name="email" type="email" value="{{ old('email') }}" required
                            class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="seu@email.com">
                    </div>
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- CPF -->
                <div>
                    <label for="cpf" class="block text-sm font-medium text-gray-700 mb-1">CPF</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-id-card text-gray-400"></i>
                        </div>
                        <input id="cpf" name="cpf" type="text" value="{{ old('cpf') }}" required
                            class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="000.000.000-00">
                    </div>
                    @error('cpf')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Telefone -->
                <div>
                    <label for="telefone" class="block text-sm font-medium text-gray-700 mb-1">Telefone</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-phone text-gray-400"></i>
                        </div>
                        <input id="telefone" name="telefone" type="text" value="{{ old('telefone') }}" required
                            class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="(00) 00000-0000">
                    </div>
                    @error('telefone')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Senha -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Senha</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <input id="password" name="password" type="password" required
                            class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Mínimo 8 caracteres">
                    </div>
                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirmar Senha -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirmar Senha</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <input id="password_confirmation" name="password_confirmation" type="password" required
                            class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Repita sua senha">
                    </div>
                </div>

                <!-- Termos -->
                <div class="flex items-center">
                    <input id="terms" name="terms" type="checkbox" required
                        class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                    <label for="terms" class="ml-2 block text-sm text-gray-700">
                        Concordo com os <a href="#" class="text-indigo-600 hover:text-indigo-500">Termos de Serviço</a> e <a href="#" class="text-indigo-600 hover:text-indigo-500">Política de Privacidade</a>
                    </label>
                </div>

                <!-- Botão -->
                <div>
                    <button type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150">
                        <i class="fas fa-user-plus mr-2"></i> Criar conta
                    </button>
                </div>
            </form>

            <!-- Rodapé -->
            <div class="bg-gray-50 px-6 py-4 text-center">
                <p class="text-xs text-gray-500">
                    © {{ date('Y') }} Minha Loja. Todos os direitos reservados.
                </p>
            </div>
        </div>
    </div>

    <!-- Máscaras e scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#cpf').inputmask('999.999.999-99');
            $('#telefone').inputmask('(99) 99999-9999');
        });
    </script>
</body>
</html>