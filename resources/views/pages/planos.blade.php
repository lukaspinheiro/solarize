@extends('layouts.app')

@section('content')
<div class="w-full mx-auto p-10 mt-8">
    <div class="max-w-7xl mx-auto bg-gray-800 opacity-95 shadow-lg rounded-2xl p-5 text-center border-4 border-yellow-400">
        <h2 class="text-3xl font-extrabold text-white sm:text-4xl text-shadow-lg">
            Nossos Planos
        </h2>
        <p class="mt-4 text-xl text-white text-shadow-lg">
            Escolha o plano que melhor se adapta às suas necessidades.
        </p>
    </div>

    <div class="mt-16 max-w-7xl mx-auto grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3"> 
        <div class="bg-white rounded-lg shadow-lg p-8 flex flex-col justify-between h-full transition-transform transform hover:scale-105">
            <div>
                <h3 class="text-xl font-semibold text-gray-900">Plano Básico</h3>
                <p class="mt-4 text-gray-600">
                    Ideal para quem está começando.
                </p>
                <p class="mt-8">
                    <span class="text-4xl font-bold text-gray-900">R$ 99</span>
                    <span class="text-base text-gray-500">/mês</span>
                </p>
                <ul class="mt-6 space-y-4 text-gray-600">
                    <li>✔ 5 Simulações por mês</li>
                    <li>✔ Suporte por email</li>
                    <li>✔ Relatórios básicos</li>
                </ul>
            </div>
            <a href="#" class="mt-8 block w-full bg-yellow-400 hover:bg-yellow-500 text-white font-semibold text-center py-2 rounded-lg inset-shadow-sm">
                Escolher
            </a>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-8 flex flex-col justify-between h-full ring-4 ring-yellow-400 transition-transform transform hover:scale-105">
            <div class="relative">
                <span class="absolute -top-3 right-0 bg-yellow-400 text-white px-3 py-1 rounded-full text-sm font-semibold shadow">
                    Mais Popular
                </span>
            </div>    
            <div>
                <h3 class="text-xl font-semibold text-gray-900">Plano Profissional</h3>
                <p class="mt-4 text-gray-600">
                    Para quem busca mais recursos e desempenho.
                </p>
                <p class="mt-8">
                    <span class="text-4xl font-bold text-gray-900">R$ 199</span>
                    <span class="text-base text-gray-500">/mês</span>
                </p>
                <ul class="mt-6 space-y-4 text-gray-600">
                    <li>✔ Simulações ilimitadas</li>
                    <li>✔ Suporte prioritário</li>
                    <li>✔ Relatórios avançados</li>
                    <li>✔ Exportação de dados</li>
                </ul>
            </div>
            <a href="#" class="mt-8 block w-full bg-yellow-400 hover:bg-yellow-500  text-white font-semibold text-center py-2 rounded-lg inset-shadow-sm">
                Escolher
            </a>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-8 flex flex-col justify-between h-full transition-transform transform hover:scale-105">
            <div>
                <h3 class="text-xl font-semibold text-gray-900">Plano Empresarial</h3>
                <p class="mt-4 text-gray-600">
                    Soluções sob medida para sua empresa.
                </p>
                <p class="mt-8">
                    <span class="text-4xl font-bold text-gray-900">Sob Consulta</span>
                </p>
                <ul class="mt-6 space-y-4 text-gray-600">
                    <li>✔ Simulações ilimitadas</li>
                    <li>✔ Suporte dedicado</li>
                    <li>✔ Integrações personalizadas</li>
                    <li>✔ Consultoria especializada</li>
                </ul>
            </div>
            <a href="{{ route('contato') }}" class="mt-8 block w-full bg-yellow-400 hover:bg-yellow-500 text-white font-semibold text-center py-2 rounded-lg inset-shadow-sm">
                Fale Conosco
            </a>
        </div>
    </div>
</div>
@endsection