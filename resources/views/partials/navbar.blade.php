<nav class="bg-gray-900 h-16 flex items-center px-20 relative">

    <div class="flex items-center gap-2">
        <a href="{{ route('home') }}">
            <img src="{{ asset('images/logo-solarize.png') }}" alt="Logo Solarize" class="h-10">
        </a>
    </div>

    <div class="absolute left-1/2 transform -translate-x-1/2 flex items-center justify-between w-1/3">
        <a href="{{ route('home') }}"
            alt="Menu Início"
            class="text-white font-semibold hover:text-yellow-400 flex items-center gap-1 transition-transform duration-300 transform hover:scale-105">
            <x-icon name="home" /> Início
        </a>
        <a href="#"
            alt="Menu Planos"
            class="text-white font-semibold hover:text-yellow-400 flex items-center gap-1 transition-transform duration-300 transform hover:scale-105">
            <x-icon name="dollar" /> Planos
        </a>
        <a href="{{ route('contato') }}"
            alt="Menu Contato"
            class="text-white font-semibold hover:text-yellow-400 flex items-center gap-1 transition-transform duration-300 transform hover:scale-105">
            <x-icon name="phone" /> Contato
        </a>
        <a href="{{ route('sobre') }}"
            alt="Menu Sobre"
            class="text-white font-semibold hover:text-yellow-400 flex items-center gap-1 transition-transform duration-300 transform hover:scale-105">
            <x-icon name="question" /> Sobre
        </a>
    </div>

    <div class="ml-auto">
        <a href="#"
            alt="Opção de Entrar"
            class="text-white font-semibold hover:text-yellow-400 flex items-center gap-1 transition-transform duration-300 transform hover:scale-105">
            Entrar <x-icon name="login" />
        </a>
    </div>

</nav>