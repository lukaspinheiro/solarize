import React, { useState } from 'react';
import { Head, useForm } from '@inertiajs/react';
import AppLayout from '../layouts/app-layout';

interface HomeProps {
    // Defina aqui os props que vêm do controller Laravel se necessário
}

interface FormData {
  cep: string;
  unidadeMedida: string;
  consumo: string;
  [key: string]: any; // <- Isso resolve o erro
}


const Home: React.FC<HomeProps> = () => {
    const { data, setData, post, processing, errors } = useForm<FormData>({
        cep: '',
        unidadeMedida: '',
        consumo: '',
    });

    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault();
        // Aqui você pode definir a rota que processará o formulário
        post('/calcular');
    };

    return (
        <AppLayout>
            <Head title="Simulador de Energia Solar" />
            
            <div className="flex items-center justify-center" style={{ minHeight: 'calc(100vh - 6rem)' }}>
                <div className="w-full max-w-md sm:max-w-lg lg:max-w-3xl mx-auto bg-gray-800 bg-opacity-90 shadow-xl/30 rounded-2xl py-10 px-12">
                    <h2 className="text-center text-white text-xl font-bold mb-6">
                        SIMULADOR DE GASTOS COM <br /> ENERGIA SOLAR
                    </h2>

                    <form onSubmit={handleSubmit} className="space-y-12">
                        <div className="space-y-8">
                            <div>
                                <label className="block text-base font-semibold text-white mb-1" htmlFor="cep">
                                    CEP
                                </label>
                                <input
                                    type="text"
                                    id="cep"
                                    name="cep"
                                    value={data.cep}
                                    onChange={(e) => setData('cep', e.target.value)}
                                    placeholder="Digite seu CEP"
                                    className="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-400 placeholder-gray-400 bg-gray-900 text-white"
                                />
                                {errors.cep && <p className="text-red-400 text-sm mt-1">{errors.cep}</p>}
                            </div>
                    
                            <div>
                                <label className="block text-base font-semibold text-white mb-1" htmlFor="unidadeMedida">
                                    Unidade de Medida
                                </label>
                                <select
                                    id="unidadeMedida"
                                    name="unidadeMedida"
                                    value={data.unidadeMedida}
                                    onChange={(e) => setData('unidadeMedida', e.target.value)}
                                    className="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-400 text-white bg-gray-900"
                                >
                                    <option value="" disabled>Selecione...</option>
                                    <option value="real">Real (R$)</option>
                                    <option value="kwh">kWh</option>
                                </select>
                                {errors.unidadeMedida && <p className="text-red-400 text-sm mt-1">{errors.unidadeMedida}</p>}
                            </div>
                    
                            <div>
                                <label className="block text-base font-semibold text-white mb-1" htmlFor="consumo">
                                    Consumo Mensal (kWh)
                                </label>
                                <input
                                    type="number"
                                    id="consumo"
                                    name="consumo"
                                    value={data.consumo}
                                    onChange={(e) => setData('consumo', e.target.value)}
                                    placeholder="Ex.: 500"
                                    className="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-400 placeholder-gray-400 bg-gray-900 text-white"
                                />
                                {errors.consumo && <p className="text-red-400 text-sm mt-1">{errors.consumo}</p>}
                            </div>   
                        </div>    

                        <button
                            type="submit"
                            disabled={processing}
                            className="w-full bg-yellow-500 hover:bg-yellow-600 disabled:bg-yellow-400 disabled:cursor-not-allowed text-slate-900 font-semibold py-2 rounded-lg transition"
                        >
                            {processing ? 'CALCULANDO...' : 'CALCULAR'}
                        </button>
                    </form>
                </div>
            </div>
        </AppLayout>
    );
};

export default Home;