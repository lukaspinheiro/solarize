import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import {
    CalculatorIcon,
    ChartBarIcon,
    ClockIcon,
    CogIcon,
    CurrencyDollarIcon,
    DocumentArrowDownIcon,
    LightBulbIcon,
    UserIcon,
    WrenchIcon,
} from '@heroicons/react/24/outline';
import type { PageProps } from '@inertiajs/core';
import { Head } from '@inertiajs/react';

interface Equipamento {
    quantidade: number;
    descricao: string;
}

interface Dados {
    potenciaSistema_raw: number;
    investimento: string;
    economiaMensal: string;
    retorno: string;
    cep: string;
    cliente: string;
    telefone: string;
    email: string;
    potenciaSistema: string;
    quantidadePlacas: number;
    potenciaPlaca: number;
    equipamentos: Record<string, Equipamento>;
    logradouro?: string;
    bairro?: string;
    cidade?: string;
    uf?: string;
}

interface Props extends PageProps {
    dados: Dados;
    auth: {
        user: any;
    };
}

export default function Resultado({ auth, dados }: Props) {
    const dataFormatada = new Date().toLocaleDateString('pt-BR');
    const query = new URLSearchParams(dados as unknown as Record<string, string>).toString();

    return (
        <>
            <Head title="Resultado da Simulação" />
            <AuthenticatedLayout header="Resultado da Simulação">
                <div className="flex justify-center p-6">
                    <div className="w-full max-w-2xl overflow-hidden rounded-lg bg-white shadow-lg">
                        <div className="bg-gradient-to-r from-green-400 to-blue-500 p-6">
                            <h2 className="text-xl font-semibold text-white">Resumo - Orçamento Solar</h2>
                        </div>

                        <div className="space-y-4 p-6">
                            {/* Seção de Informações do Cliente */}
                            <div className="rounded-lg border p-4">
                                <h3 className="mb-3 flex items-center text-lg font-semibold text-gray-700">
                                    <UserIcon className="mr-2 h-5 w-5" />
                                    Informações do Cliente
                                </h3>
                                <div className="space-y-2">
                                    <p>
                                        <strong>Nome:</strong> {dados.cliente || 'Não informado'}
                                    </p>
                                    <p>
                                        <strong>Telefone:</strong> {dados.telefone || 'Não informado'}
                                    </p>
                                    <p>
                                        <strong>Email:</strong> {dados.email || 'Não informado'}
                                    </p>
                                    <p>
                                        <strong>Endereço:</strong>{' '}
                                        {[dados.logradouro, dados.bairro, dados.cidade, dados.uf].filter(Boolean).join(', ') || 'Não informado'}
                                    </p>
                                </div>
                            </div>

                            {/* Seção Financeira */}
                            <div className="rounded-lg border p-4">
                                <h3 className="mb-3 flex items-center text-lg font-semibold text-gray-700">
                                    <CurrencyDollarIcon className="mr-2 h-5 w-5" />
                                    Análise Financeira
                                </h3>
                                <div className="space-y-2">
                                    <div className="flex items-center">
                                        <ChartBarIcon className="mr-2 h-5 w-5 text-gray-600" />
                                        <span>
                                            <strong>Investimento:</strong> R$ {dados.investimento}
                                        </span>
                                    </div>
                                    <div className="flex items-center">
                                        <CurrencyDollarIcon className="mr-2 h-5 w-5 text-gray-600" />
                                        <span>
                                            <strong>Economia Mensal:</strong> R$ {dados.economiaMensal}
                                        </span>
                                    </div>
                                    <div className="flex items-center">
                                        <ClockIcon className="mr-2 h-5 w-5 text-gray-600" />
                                        <span>
                                            <strong>Payback:</strong> {dados.retorno} meses
                                        </span>
                                    </div>
                                </div>
                            </div>

                            {/* Seção Técnica */}
                            <div className="rounded-lg border p-4">
                                <h3 className="mb-3 flex items-center text-lg font-semibold text-gray-700">
                                    <LightBulbIcon className="mr-2 h-5 w-5" />
                                    Especificações Técnicas
                                </h3>
                                <div className="space-y-4">
                                    <div>
                                        <h4 className="flex items-center font-medium text-gray-600">
                                            <CalculatorIcon className="mr-2 h-5 w-5" />
                                            Sistema Fotovoltaico
                                        </h4>
                                        <div className="ml-7 mt-1 space-y-1">
                                            <p>
                                                <strong>Potência do Sistema:</strong> {dados.potenciaSistema} kW
                                            </p>
                                            <p>
                                                <strong>Placas Solares:</strong> {dados.quantidadePlacas} x {dados.potenciaPlaca}W
                                            </p>
                                            <p>
                                                <strong>Produção Estimada:</strong> ~{Math.round(dados.potenciaSistema_raw * 450)} kWh/mês
                                            </p>
                                        </div>
                                    </div>

                                    <div>
                                        <h4 className="flex items-center font-medium text-gray-600">
                                            <WrenchIcon className="mr-2 h-5 w-5" />
                                            Equipamentos Principais
                                        </h4>
                                        <ul className="ml-7 mt-1 space-y-1">
                                            {Object.entries(dados.equipamentos).map(([equipamento, detalhes]) => (
                                                <li key={equipamento} className="flex items-start">
                                                    <CogIcon className="mr-2 mt-0.5 h-4 w-4 flex-shrink-0" />
                                                    <span>
                                                        <strong>{equipamento}:</strong> {detalhes.quantidade}{' '}
                                                        {detalhes.quantidade > 1 ? 'unidades' : 'unidade'} - {detalhes.descricao}
                                                    </span>
                                                </li>
                                            ))}
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            {/* Botão de Download */}
                            <a
                                href={`/relatorio-pdf?${query}`}
                                target="_blank"
                                rel="noopener noreferrer"
                                className="mt-4 flex items-center justify-center space-x-2 rounded-md bg-green-600 px-4 py-2 text-white transition hover:bg-green-700"
                            >
                                <DocumentArrowDownIcon className="h-5 w-5" />
                                <span>Baixar Relatório Completo (PDF)</span>
                            </a>
                        </div>
                    </div>
                </div>
            </AuthenticatedLayout>
        </>
    );
}

// Definindo o layout corretamente
// Resultado.layout = (page: React.ReactNode) => <AuthenticatedLayout children={page} />;
