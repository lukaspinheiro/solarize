@extends('layouts.app')

@section('title', 'contato')

@section('content')
<div class="flex items-center justify-center" style="min-height: calc(100vh - 8rem);">
    <div class="w-full max-w-3xl mx-auto bg-gray-800 bg-opacity-90 shadow-xl/30 rounded-2xl p-16 mt-8">
        <h2 class="text-center text-white text-3xl font-bold mb-6">
            Entre em Contato
        </h2>
        <p class="text-center text-gray-300 mb-10">
            Preencha o formulário abaixo para que possamos entrar em contato com a sua empresa de energia solar.
        </p>

        <form action="#" method="POST" class="space-y-6">
            @csrf

            <div>
                <label class="block text-sm font-semibold text-white mb-1" for="empresa">Nome da Empresa</label>
                <input type="text" id="empresa" name="empresa" required
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 bg-gray-900 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400"
                    placeholder="Ex.: Solarize Orçamento">
            </div>

            <div>
                <label class="block text-sm font-semibold text-white mb-1" for="nome">Seu Nome</label>
                <input type="text" id="nome" name="nome" required
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 bg-gray-900 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400"
                    placeholder="Seu nome">
            </div>

            <div>
                <label class="block text-sm font-semibold text-white mb-1" for="email">E-mail</label>
                <input type="email" id="email" name="email" required
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 bg-gray-900 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400"
                    placeholder="email@empresa.com">
            </div>

            <div>
                <label class="block text-sm font-semibold text-white mb-1" for="telefone">Telefone</label>
                <input type="text" id="telefone" name="telefone"
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 bg-gray-900 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400"
                    placeholder="(xx) xxxxx-xxxx">
            </div>

            <button type="submit"
                class="w-full bg-yellow-500 hover:bg-yellow-600 text-slate-900 font-semibold py-3 mt-4 rounded-lg transition">
                Enviar
            </button>
        </form>
    </div>
</div>
@endsection