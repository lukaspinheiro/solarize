@extends('layouts.app')

@section('title', 'Sobre')
@section('head')
<script src="https://kit.fontawesome.com/6df76df637.js" crossorigin="anonymous"></script>
@endsection

@section('content')
<div class="w-full max-w-4xl mx-auto bg-gray-800 bg-opacity-90 shadow-lg rounded-2xl p-10 mt-8">
    <h2 class="text-center text-white text-3xl font-bold mb-6">
        Sobre o Solarize
    </h2>

    <p class="text-gray-300 text-lg mb-6">
        O <span class="text-yellow-400 font-semibold">Solarize</span> é uma plataforma desenvolvida com o objetivo de ajudar empresas na simulação de custos e orçamentos para a instalação de sistemas de energia solar fotovoltaica.
    </p>

    <p class="text-gray-300 text-lg mb-6">
        Através da nossa ferramenta, é possível calcular de forma rápida e precisa quanto custará a implementação de placas solares, considerando o consumo mensal de energia.
    </p>

    <h3 class="text-white text-2xl text-center font-semibold mt-10 mb-4">
        Quem Somos
    </h3>

    <p class="text-gray-300 text-lg mb-6">
        Este site foi desenvolvido como uma atividade avaliativa para a disciplina de <span class="text-yellow-400">Desenvolvimento e Programação Web</span>, com o propósito de aplicar conhecimentos práticos em desenvolvimento de sistemas web.
    </p>

    <div class="grid sm:grid-cols-1 md:grid-cols-3 gap-6 text-center">
    <!-- Card Lukas -->
    <div class="bg-gray-700 p-6 rounded-xl hover:scale-105 transition inset-shadow-sm">
        <div class="flex justify-center mb-4">
            <img src="{{ asset('images/profile-lukas.jpeg') }}" alt="Foto de Lukas"
                class="w-24 h-24 rounded-full border-4 border-yellow-400 object-cover">
        </div>
        <h4 class="text-yellow-400 font-bold text-lg">Lukas Pinheiro da Silva</h4>
        <p class="text-gray-300">Desenvolvedor Full Stack</p>

        <div class="flex justify-center">
            <a href="https://www.linkedin.com/in/lukas-pinheiro" target="_blank" class="text-white hover:text-yellow-400 text-xl p-2">
                <i class="fab fa-linkedin"></i>
            </a>
            <a href="https://www.instagram.com/lukaspinheiro/" target="_blank" class="text-white hover:text-yellow-400 text-xl p-2">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="https://github.com/lukaspinheiro" target="_blank" class="text-white hover:text-yellow-400 text-xl p-2">
                <i class="fa-brands fa-github"></i>
            </a>
        </div>
    </div>

    <!-- Card Marya -->
    <div class="bg-gray-700 p-6 rounded-xl hover:scale-105 transition inset-shadow-sm">
        <div class="flex justify-center mb-4">
            <img src="{{ asset('images/profile-marya.jpeg') }}" alt="Foto de Marya"
                class="w-24 h-24 rounded-full border-4 border-yellow-400 object-cover">
        </div>
        <h4 class="text-yellow-400 font-bold text-lg">Marya Clara Oliveira</h4>
        <p class="text-gray-300">Desenvolvedora Full Stack</p>
        <div class="flex justify-center">
            <a href="https://www.linkedin.com/in/marya-clara/" target="_blank" class="text-white hover:text-yellow-400 text-xl p-2">
                <i class="fab fa-linkedin"></i>
            </a>
            <a href="https://github.com/Ayram450" target="_blank" class="text-white hover:text-yellow-400 text-xl p-2">
                <i class="fa-brands fa-github"></i>
            </a>
        </div>
    </div>

    <!-- Card Erick -->
    <div class="bg-gray-700 p-6 rounded-xl hover:scale-105 transition inset-shadow-sm">
        <div class="flex justify-center mb-4">
            <img src="{{ asset('images/profile-erick.jpeg') }}" alt="Foto de Erick"
                class="w-24 h-24 rounded-full border-4 border-yellow-400 object-cover">
        </div>
        <h4 class="text-yellow-400 font-bold text-lg">Erick Sanchez</h4>
        <p class="text-gray-300">Desenvolvedor Back-end</p>
        <div class="flex justify-center">
            <a href="https://github.com/ErikSanch" target="_blank" class="text-white hover:text-yellow-400 text-xl p-2">
                <i class="fa-brands fa-github"></i>
            </a>
        </div>
    </div>

</div>
@endsection