// resources/js/Pages/SolarForm.tsx
import { CurrencyDollarIcon, EnvelopeIcon, LightBulbIcon, MapPinIcon, PhoneIcon, UserIcon } from '@heroicons/react/24/outline';
import { useForm } from '@inertiajs/react';
import { useEffect, useState } from 'react';

export default function SolarForm() {
    const { data, setData, post } = useForm({
        cep: '',
        valorConta: '',
        kwh: '',
        logradouro: '',
        bairro: '',
        cidade: '',
        uf: '',
        cliente: '',
        telefone: '',
        email: '',
    });

    // busca cep via API VI CEP
    const [infoCep, setInfoCep] = useState('');

    useEffect(() => {
        const cepLimpo = data.cep.replace(/\D/g, '');

        if (cepLimpo.length === 8) {
            fetch(`https://viacep.com.br/ws/${cepLimpo}/json/`)
                .then((res) => res.json())
                .then((res) => {
                    if (!res.erro) {
                        //dados coletado via CEP
                        const texto = `${res.localidade}, ${res.uf}, ${res.logradouro}, ${res.bairro}`;
                        setInfoCep(texto);
                    } else {
                        setInfoCep('');
                    }
                })
                .catch(() => setInfoCep(''));
        } else {
            setInfoCep('');
        }
    }, [data.cep]);

    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault();
        post('/calculo');
    };

    return (
        <div className="bg-gray dark:text-100 min-h-screen p-8 text-gray-800 dark:bg-gray-900">
            <form onSubmit={handleSubmit} className="mx-auto max-w-lg space-y-6 rounded-lg bg-white p-6 shadow">
                {/* cliente*/}
                <div className="relative">
                    <label htmlFor="cliente" className="block text-sm font-medium text-gray-700">
                        CLIENTE
                    </label>
                    <div className="relative mt-1 rounded-md shadow-sm">
                        <div className="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                            <UserIcon className="h-5 w-5 text-blue-500" />
                        </div>
                        <input
                            id="cliente"
                            type="text"
                            value={data.cliente}
                            onChange={(e) => setData('cliente', e.target.value)}
                            className="block w-full rounded-md border border-gray-300 py-2 pl-10 pr-3 focus:border-indigo-500 focus:ring-indigo-500"
                            placeholder="Nome Cliente"
                        />
                    </div>
                </div>

                {/* Telefone*/}
                <div className="relative">
                    <label htmlFor="telefone" className="block text-sm font-medium text-gray-700">
                        TELEFONE
                    </label>
                    <div className="relative mt-1 rounded-md shadow-sm">
                        <div className="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                            <PhoneIcon className="h-5 w-5 text-blue-500" />
                        </div>
                        <input
                            id="telefone"
                            type="text"
                            value={data.telefone}
                            onChange={(e) => setData('telefone', e.target.value)}
                            className="block w-full rounded-md border border-gray-300 py-2 pl-10 pr-3 focus:border-indigo-500 focus:ring-indigo-500"
                            placeholder="(69) 99999-9999"
                        />
                    </div>
                </div>

                {/* Email*/}
                <div className="relative">
                    <label htmlFor="telefone" className="block text-sm font-medium text-gray-700">
                        EMAIL
                    </label>
                    <div className="relative mt-1 rounded-md shadow-sm">
                        <div className="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                            <EnvelopeIcon className="h-5 w-5 text-blue-500" />
                        </div>
                        <input
                            id="email"
                            type="text"
                            value={data.email}
                            onChange={(e) => setData('email', e.target.value)}
                            className="block w-full rounded-md border border-gray-300 py-2 pl-10 pr-3 focus:border-indigo-500 focus:ring-indigo-500"
                            placeholder="email@provedor.com"
                        />
                    </div>
                </div>

                {/* CEP */}
                <div className="relative">
                    <label htmlFor="cep" className="block text-sm font-medium text-gray-700">
                        CEP
                    </label>
                    <div className="relative mt-1 rounded-md shadow-sm">
                        <div className="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                            <MapPinIcon className="h-5 w-5 text-green-500" />
                        </div>
                        <input
                            id="cep"
                            type="text"
                            value={data.cep + (infoCep ? `: ${infoCep}` : '')}
                            onChange={(e) => {
                                const somenteCep = e.target.value.split(':')[0].trim();
                                setData('cep', somenteCep);
                            }}
                            required
                            className="block w-full rounded-md border border-gray-300 py-2 pl-10 pr-3 focus:border-indigo-500 focus:ring-indigo-500"
                            placeholder="00000-000"
                        />
                    </div>
                </div>

                {/* Valor da conta */}
                <div className="relative">
                    <label htmlFor="valorConta" className="block text-sm font-medium text-gray-700">
                        Valor da Conta (R$)
                    </label>
                    <div className="relative mt-1 rounded-md shadow-sm">
                        <div className="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                            <CurrencyDollarIcon className="h-5 w-5 text-red-500" />
                        </div>
                        <input
                            id="valorConta"
                            type="number"
                            value={data.valorConta}
                            onChange={(e) => setData('valorConta', e.target.value)}
                            className="block w-full rounded-md border border-gray-300 py-2 pl-10 pr-3 focus:border-indigo-500 focus:ring-indigo-500"
                            placeholder="350"
                            required
                        />
                    </div>
                </div>

                {/* Consumo em kWh */}
                <div className="relative">
                    <label htmlFor="kwh" className="block text-sm font-medium text-gray-700">
                        Consumo (kWh)
                    </label>
                    <div className="relative mt-1 rounded-md shadow-sm">
                        <div className="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                            <LightBulbIcon className="h-5 w-5 text-yellow-500" />
                        </div>
                        <input
                            id="kwh"
                            type="number"
                            value={data.kwh}
                            onChange={(e) => setData('kwh', e.target.value)}
                            className="block w-full rounded-md border border-gray-300 py-2 pl-10 pr-3 focus:border-indigo-500 focus:ring-indigo-500"
                            placeholder="450"
                        />
                    </div>
                </div>

                {/* Botão */}
                <button
                    type="submit"
                    className="flex w-full items-center justify-center rounded-md bg-indigo-600 px-4 py-2 text-white hover:bg-indigo-700"
                >
                    <LightBulbIcon className="mr-2 h-5 w-5 animate-pulse" />
                    Calcular
                </button>
            </form>
        </div>
    );
}
