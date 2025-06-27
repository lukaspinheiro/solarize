<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Barryvdh\DomPDF\Facade\Pdf;

class SolarController extends Controller
{
    public function calcular(Request $request)
    {
        $request->validate([
            'valorConta' => 'nullable|numeric|min:0',
            'kwh' => 'nullable|numeric|min:0',
            'cep' => 'nullable|string|max:10',
            'logradouro' => 'nullable|string',
            'bairro' => 'nullable|string',
            'cidade' => 'nullable|string',
            'uf' => 'nullable|string',
            'cliente' => 'nullable|string',
            'telefone' => 'nullable|string',
            'email' => 'nullable|email',
        ]);

        // Parâmetros de cálculo
        $custoPorKwh = 0.8;
        $custoPorKw = 5500;
        $producaoMensalPorKw = 450;
        $potenciaPlaca = 550;
        $horasSolPico = 4.5;

        // Cálculos
        $kwh = $request->kwh ?? ($request->valorConta / $custoPorKwh);
        $potenciaKw = $kwh / $producaoMensalPorKw;
        $investimento = $potenciaKw * $custoPorKw;
        $economiaMensal = 0.8 * ($request->valorConta ?? ($kwh * $custoPorKwh));
        $paybackMeses = $investimento / $economiaMensal;

        $potenciaTotalW = $potenciaKw * 1000;
        $quantidadePlacas = ceil($potenciaTotalW / $potenciaPlaca);
        $equipamentos = $this->calcularEquipamentos($potenciaKw);

        $dados = [
    'investimento' => number_format($investimento, 2, ',', '.'),
    'economiaMensal' => number_format($economiaMensal, 2, ',', '.'),
    'retorno' => number_format($paybackMeses, 1, ',', ''),
    'potenciaSistema' => number_format($potenciaKw, 2, ',', '.'),
'potenciaSistema_raw' => $potenciaKw,
'quantidadePlacas' => $quantidadePlacas,


    'potenciaPlaca' => $potenciaPlaca,
    'equipamentos' => $equipamentos,
    'cep' => $request->cep,
    'cliente' => $request->cliente ?? 'Não informado',
    'telefone' => $request->telefone ?? 'Não informado',
    'email' => $request->email ?? 'Não informado',
    'logradouro' => $request->logradouro,
    'bairro' => $request->bairro,
    'cidade' => $request->cidade,
    'uf' => $request->uf,
];

        session()->put('dados', $dados);

        return redirect()->route('resultado');
    }

    private function calcularEquipamentos(float $potenciaKw): array
    {
        return [
            
            'Placas Solares' => [
                'quantidade' => ceil($potenciaKw * 1000 / 550),
                'descricao' => 'Fotovoltaicas de 550W monocristalinas',
            ],
            'Inversor' => [
                'quantidade' => ceil($potenciaKw / 5),
                'descricao' => 'Inversor grid-tie ' . (ceil($potenciaKw / 5) * 5) . 'kW',
            ],
            'Estrutura' => [
                'quantidade' => 1,
                'descricao' => 'Sistema de fixação para telhado',
            ],
            'String Box' => [
                'quantidade' => 1,
                'descricao' => 'Caixa de proteção DC com disjuntores',
            ],
            'Cabos' => [
                'quantidade' => ceil($potenciaKw * 20),
                'descricao' => 'Cabos solares 6mm²',
            ],
            'Conectores' => [
                'quantidade' => ceil($potenciaKw * 1000 / 550) * 2,
                'descricao' => 'Conectores MC4',
            ],
            'Monitoramento' => [
                'quantidade' => 1,
                'descricao' => 'Sistema de monitoramento online',
            ],
        ];
    }

    public function mostrarResultado(Request $request)
    {
        $dados = session()->get('dados', []);

        if (empty($dados)) {
            return redirect()->route('inicio')->with('error', 'Nenhuma simulação encontrada.');
        }

        if (!isset($dados['equipamentos']) && isset($dados['potenciaSistema'])) {
            $potenciaKw = (float) $dados['potenciaSistema'];
            $dados['equipamentos'] = $this->calcularEquipamentos($potenciaKw);
        }

        return Inertia::render('Resultado', [
            'dados' => $dados,
        ]);
    }

    public function baixarRelatorio(Request $request)
    {
        $dados = session()->get('dados', []);

        if (empty($dados)) {
            return redirect()->route('inicio')->with('error', 'Nenhuma simulação encontrada para gerar PDF.');
        }

        if (!isset($dados['equipamentos']) && isset($dados['potenciaSistema'])) {
            $potenciaKw = (float) $dados['potenciaSistema'];
            $dados['equipamentos'] = $this->calcularEquipamentos($potenciaKw);
        }

        $logoPath = public_path('apple-touch-icon.png');

        $pdf = PDF::loadView('pdf.relatorio', [
            'dados' => $dados,
            'logo' => 'data:image/png;base64,' . base64_encode(file_get_contents($logoPath)),
        ])->setOptions([
            'isRemoteEnabled' => true,
            'isHtml5ParserEnabled' => true,
            'defaultFont' => 'sans-serif',
        ]);

        return $pdf->download('proposta-solar-' . now()->format('Ymd') . '.pdf');
    }
}
