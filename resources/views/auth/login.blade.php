<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesso Premium | Sistema Administrativo</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-50: #f0f9ff;
            --primary-100: #e0f2fe;
            --primary-200: #bae6fd;
            --primary-300:rgb(32, 208, 16);
            --primary-400: #38bdf8;
            --primary-500: #0ea5e9;
            --primary-600: #0284c7;
            --primary-700: #0369a1;
            --primary-800: #075985;
            --primary-900: #0c4a6e;
            
            --secondary-50: #f5f3ff;
            --secondary-100: #ede9fe;
            --secondary-200: #ddd6fe;
            --secondary-300: #c4b5fd;
            --secondary-400: #a78bfa;
            --secondary-500: #8b5cf6;
            --secondary-600: #7c3aed;
            --secondary-700: #6d28d9;
            --secondary-800: #5b21b6;
            --secondary-900: #4c1d95;
            
            --accent-50: #fef2f2;
            --accent-100: #fee2e2;
            --accent-200: #fecaca;
            --accent-300: #fca5a5;
            --accent-400: #f87171;
            --accent-500: #ef4444;
            --accent-600: #dc2626;
            --accent-700: #b91c1c;
            --accent-800: #991b1b;
            --accent-900: #7f1d1d;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, var(--primary-50) 0%, var(--secondary-50) 100%);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
        }
        
        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        .login-container {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.85);
            box-shadow: 0 25px 45px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        
        .login-container:hover {
            box-shadow: 0 30px 50px rgba(0, 0, 0, 0.15);
            transform: translateY(-5px);
        }
        
        .illustration-side {
            background: linear-gradient(135deg, var(--primary-600) 0%, var(--secondary-600) 100%);
            position: relative;
            overflow: hidden;
        }
        
        .illustration-side::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0) 70%);
            animation: pulse 8s infinite linear;
        }
        
        @keyframes pulse {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        .form-input {
            transition: all 0.3s ease;
            border: 2px solid #e2e8f0;
            background: rgba(255, 255, 255, 0.7);
        }
        
        .form-input:focus {
            border-color: var(--primary-400);
            box-shadow: 0 0 0 3px rgba(14, 165, 233, 0.2);
            background: white;
        }
        
        .form-input.error {
            border-color: var(--accent-400);
            animation: shake 0.5s;
        }
        
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
            20%, 40%, 60%, 80% { transform: translateX(5px); }
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-500) 0%, var(--secondary-500) 100%);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(14, 165, 233, 0.3);
        }
        
        .btn-primary::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(
                to bottom right,
                rgba(255, 255, 255, 0.3) 0%,
                rgba(255, 255, 255, 0) 60%
            );
            transform: rotate(30deg);
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover::after {
            left: 100%;
        }
        
        .social-btn {
            transition: all 0.3s ease;
            border: 1px solid #e2e8f0;
        }
        
        .social-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            color: #94a3b8;
        }
        
        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #e2e8f0;
        }
        
        .divider::before {
            margin-right: 1rem;
        }
        
        .divider::after {
            margin-left: 1rem;
        }
        
        .floating-label {
            position: absolute;
            left: 15px;
            top: 12px;
            color: #94a3b8;
            transition: all 0.3s ease;
            pointer-events: none;
            background: white;
            padding: 0 5px;
        }
        
        .form-group:focus-within .floating-label,
        .form-group.filled .floating-label {
            top: -10px;
            left: 10px;
            font-size: 0.75rem;
            color: var(--primary-600);
            background: linear-gradient(to bottom, white 50%, transparent 50%);
        }
        
        .toggle-password {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #94a3b8;
            transition: color 0.3s ease;
        }
        
        .toggle-password:hover {
            color: var(--primary-600);
        }
        
        .particle {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            animation: float 15s infinite linear;
        }
        
        @keyframes float {
            0% { transform: translateY(0) rotate(0deg); opacity: 1; }
            100% { transform: translateY(-1000px) rotate(720deg); opacity: 0; }
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4">
    <!-- Particles Background -->
    <div id="particles-js" class="absolute inset-0 overflow-hidden"></div>
    
  
        
        <!-- Form Side -->
<div class="lg:w-1/2 h-full flex items-center justify-center p-8">
  <div class="bg-white border-4 border-gray-300 rounded-2xl shadow-lg p-10 w-full max-w-md mx-auto">
  <div class="mb-12">
    <h2 class="text-3xl font-bold text-white"></h2>
  </div>

  <div class="flex-grow flex flex-col justify-center space-y-6">
            <!-- Logo -->
            <div class="absolute top-6 left-6">
                <div class="flex items-center">
                    <div class="w-8 h-8 rounded-full bg-primary-500 flex items-center justify-center mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <span class="font-bold text-xl text-gray-800"><span class="text-primary-600"></span></span>
                </div>
            </div>
            
            <!-- Form Title -->
            <div class="mb-10 text-center">
                <h1 class="text-3xl font-bold text-gray-800 mb-2">Acesse sua conta</h1>
                <p class="text-gray-600">Entre com suas credenciais para continuar</p>
            </div>
            
            <!-- Error Messages -->
            @if ($errors->any())
                <div class="mb-6 p-4 bg-accent-50 border-l-4 border-accent-500 rounded">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-accent-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-accent-800">Erro ao fazer login</h3>
                            <div class="mt-2 text-sm text-accent-700">
                                <ul class="list-disc pl-5 space-y-1">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            
            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf
                
                <!-- Email Field -->
                <div class="form-group relative">
                    <label for="email" class="floating-label">E-mail</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="form-input w-full px-4 py-3 rounded-lg focus:outline-none @error('email') error @enderror"
                        oninput="this.parentElement.classList.toggle('filled', this.value !== '')">
                </div>
                
                <!-- Password Field -->
                <div class="form-group relative">
                    <label for="password" class="floating-label">Senha</label>
                    <div class="relative">
                        <input id="password" type="password" name="password" required
                            class="form-input w-full px-4 py-3 rounded-lg focus:outline-none @error('password') error @enderror"
                            oninput="this.parentElement.parentElement.classList.toggle('filled', this.value !== '')">
                        <span class="toggle-password" onclick="togglePasswordVisibility()">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                            </svg>
                        </span>
                    </div>
                </div>
                
                <!-- Remember & Forgot Password -->
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember" name="remember" type="checkbox"
                            class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded">
                        <label for="remember" class="ml-2 block text-sm text-gray-700">
                            Manter conectado
                        </label>
                    </div>
                    <div class="text-sm">
                        <a href="{{ route('password.request') }}" class="font-medium text-primary-600 hover:text-primary-500">
                            Esqueceu a senha?
                        </a>
                    </div>
                </div>
                
                <!-- Submit Button -->
                <div>
                    <button type="submit" class="btn-primary w-full py-3 px-4 text-white font-semibold rounded-lg shadow focus:outline-none">
                        <span class="relative z-10">Entrar</span>
                    </button>
                </div>
                
                <!-- Divider -->
                <div class="divider text-sm text-gray-500 my-6">ou continue com</div>
                
                <!-- Social Login -->
                <div class="grid grid-cols-2 gap-4">
                    <a href="#" class="social-btn flex items-center justify-center py-2 px-4 border border-gray-200 rounded-lg hover:border-primary-300">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-2 16h-2v-6h2v6zm-1-6.891c-.607 0-1.1-.496-1.1-1.109 0-.612.492-1.109 1.1-1.109s1.1.497 1.1 1.109c0 .613-.493 1.109-1.1 1.109zm8 6.891h-1.998v-2.861c0-1.881-2.002-1.722-2.002 0v2.861h-2v-6h2v1.093c.872-1.616 4-1.736 4 1.548v3.359z"/>
                        </svg>
                        LinkedIn
                    </a>
                    <a href="#" class="social-btn flex items-center justify-center py-2 px-4 border border-gray-200 rounded-lg hover:border-primary-300">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                        </svg>
                        GitHub
                    </a>
                </div>
            </form>
            
            <!-- Sign Up Link -->
            <div class="mt-8 text-center text-sm text-gray-600">
                Não tem uma conta? 
                <a href="{{ route('register') }}" class="font-medium text-primary-600 hover:text-primary-500">
                    Cadastre-se
                </a>
            </div>
        </div>
    </div>
    
    <!-- Particles.js Script -->
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script>
        // Toggle Password Visibility
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
        }
        
        // Initialize Particles.js
        document.addEventListener('DOMContentLoaded', function() {
            if (document.getElementById('particles-js')) {
                particlesJS('particles-js', {
                    "particles": {
                        "number": {
                            "value": 80,
                            "density": {
                                "enable": true,
                                "value_area": 800
                            }
                        },
                        "color": {
                            "value": "#7dd3fc"
                        },
                        "shape": {
                            "type": "circle",
                            "stroke": {
                                "width": 0,
                                "color": "#000000"
                            },
                            "polygon": {
                                "nb_sides": 5
                            }
                        },
                        "opacity": {
                            "value": 0.3,
                            "random": false,
                            "anim": {
                                "enable": false,
                                "speed": 1,
                                "opacity_min": 0.1,
                                "sync": false
                            }
                        },
                        "size": {
                            "value": 3,
                            "random": true,
                            "anim": {
                                "enable": false,
                                "speed": 40,
                                "size_min": 0.1,
                                "sync": false
                            }
                        },
                        "line_linked": {
                            "enable": true,
                            "distance": 150,
                            "color": "#7dd3fc",
                            "opacity": 0.2,
                            "width": 1
                        },
                        "move": {
                            "enable": true,
                            "speed": 2,
                            "direction": "none",
                            "random": false,
                            "straight": false,
                            "out_mode": "out",
                            "bounce": false,
                            "attract": {
                                "enable": false,
                                "rotateX": 600,
                                "rotateY": 1200
                            }
                        }
                    },
                    "interactivity": {
                        "detect_on": "canvas",
                        "events": {
                            "onhover": {
                                "enable": true,
                                "mode": "grab"
                            },
                            "onclick": {
                                "enable": true,
                                "mode": "push"
                            },
                            "resize": true
                        },
                        "modes": {
                            "grab": {
                                "distance": 140,
                                "line_linked": {
                                    "opacity": 1
                                }
                            },
                            "bubble": {
                                "distance": 400,
                                "size": 40,
                                "duration": 2,
                                "opacity": 8,
                                "speed": 3
                            },
                            "repulse": {
                                "distance": 200,
                                "duration": 0.4
                            },
                            "push": {
                                "particles_nb": 4
                            },
                            "remove": {
                                "particles_nb": 2
                            }
                        }
                    },
                    "retina_detect": true
                });
            }
            
            // Add floating label functionality
            document.querySelectorAll('.form-input').forEach(input => {
                input.addEventListener('input', function() {
                    this.parentElement.classList.toggle('filled', this.value !== '');
                });
                
                // Initialize filled state
                if (input.value !== '') {
                    input.parentElement.classList.add('filled');
                }
            });
        });
    </script>
</body>
</html>