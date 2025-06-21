@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-center" style="min-height: calc(100vh - 6rem);">
        <div class="w-full max-w-md sm:max-w-lg lg:max-w-3xl mx-auto bg-gray-800 bg-opacity-90 shadow-xl/30 rounded-2xl py-10 px-12">
            <h2 class="text-center text-white text-xl font-bold mb-6">
                SIMULADOR DE GASTOS COM <br> ENERGIA SOLAR
            </h2>

            <form action="#" method="POST" class="space-y-12">
                @csrf
                <div class="space-y-8">
                    <div>
                        <label class="block text-base font-semibold text-white mb-1" for="cep">CEP</label>
                        <input
                            type="text"
                            id="cep"
                            name="cep"
                            placeholder="Digite seu CEP"
                            class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-400 placeholder-gray-400 bg-gray-900"
                        />
                    </div>
            
                    <div>
                        <label class="block text-base font-semibold text-white mb-1" for="unidadeMedida">Unidade de Medida</label>
                        <select
                            id="unidadeMedida"
                            name="unidadeMedida"
                            class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-400 text-gray-400 bg-gray-900">
                            <option value="" disabled selected hidden>Selecione...</option>
                            <option value="real">Real (R$)</option>
                            <option value="kwh">kWh</option>
                        </select>
                    </div>
            
                    <div>
                        <label class="block text-base font-semibold text-white mb-1" for="consumo">Consumo Mensal (kWh)</label>
                        <input
                            type="number"
                            id="consumo"
                            name="consumo"
                            placeholder="Ex.: 500"
                            class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-400 placeholder-gray-400 bg-gray-900"/>
                    </div>   
                </div>    

                <button
                    type="submit"
                    class="w-full bg-yellow-500 hover:bg-yellow-600 text-slate-900 font-semibold py-2 rounded-lg transition">
                    CALCULAR
                </button>
            </form>
        </div>
    </div>
@endsection