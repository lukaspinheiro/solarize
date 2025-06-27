<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Proposta Comercial - Energia Solar</title>
    <style type="text/css">
        body {
            margin: 0;
            padding: 0;
            font-family: 'Helvetica', Arial, sans-serif;
            color: #333;
            line-height: 1.5;
            font-size: 12pt;
        }

        .page {
            padding: 20px;
            width: 100%;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #2c3e50;
            padding-bottom: 15px;
        }

        .logo {
            height: 70px;
            margin-bottom: 10px;
        }

        .section {
            margin-bottom: 25px;
            page-break-inside: avoid;
        }

        .section-title {
            background-color: #2c3e50;
            color: white;
            padding: 8px 15px;
            border-radius: 4px;
            font-size: 14pt;
            margin-bottom: 10px;
        }

        .info-box {
            background-color: #f8f9fa;
            border-left: 4px solid #3498db;
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 0 4px 4px 0;
        }

        .highlight {
            font-size: 14pt;
            font-weight: bold;
            color: #e74c3c;
        }

        .two-columns {
            display: block;
            width: 100%;
            overflow: hidden;
        }

        .two-columns::after {
            content: "";
            display: table;
            clear: both;
        }

        .column {
            width: 48%;
            float: left;
        }

        .column:last-child {
            float: right;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
            font-size: 11pt;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 10pt;
            color: #7f8c8d;
            border-top: 1px solid #eee;
            padding-top: 10px;
        }

        ul {
            margin: 0;
            padding-left: 20px;
        }

        li {
            margin-bottom: 5px;
        }
    </style>
</head>

<body>
    <div class="page">
        <div class="header">
            <img src="{{ $logo }}" class="logo" alt="Logo">
            <h2>Proposta Comercial - Sistema de Energia Solar</h2>
            <p>Data: {{ date('d/m/Y') }}</p>
        </div>

        <div class="section">
            <div class="section-title">Informações do Cliente</div>
            <div class="info-box">
                <p><strong>Nome:</strong> {{ $dados['cliente'] ?? 'Não informado' }}</p>
                <p><strong>Email:</strong> {{ $dados['email'] ?? 'Não informado' }}</p>
                <p><strong>Telefone:</strong> {{ $dados['telefone'] ?? 'Não informado' }}</p>
                @if (!empty($dados['logradouro']))
                    <p><strong>Endereço:</strong> {{ $dados['logradouro'] }},
                        {{ $dados['bairro'] }}, {{ $dados['cidade'] }}/{{ $dados['uf'] }} - CEP: {{ $dados['cep'] }}
                    </p>
                @endif
            </div>
        </div>

        <div class="section">
            <div class="section-title">Análise Financeira</div>
            <div class="two-columns">
                <div class="column">
                    <div class="info-box">
                        <h3>Investimento Total</h3>
                        <p class="highlight">R$ {{ $dados['investimento'] ?? '0,00' }}</p>
                        <p>Valor aproximado para instalação completa</p>
                    </div>
                </div>
                <div class="column">
                    <div class="info-box">
                        <h3>Economia Mensal</h3>
                        <p class="highlight">R$ {{ $dados['economiaMensal'] ?? '0,00' }}</p>
                        <p>Redução média na conta de energia</p>
                    </div>
                </div>
            </div>
            <div class="info-box">
                <h3>Retorno do Investimento (Payback)</h3>
                <p class="highlight">

                    @php
                        $retornoMeses = str_replace(',', '.', $dados['retorno'] ?? '0');
                        $retornoAnos = number_format(floatval($retornoMeses) / 12, 1, ',', '.');
                    @endphp
                    {{ $dados['retorno'] ?? '0' }} meses ({{ $retornoAnos }} anos)

                </p>
                <p>Tempo estimado para o sistema se pagar</p>
            </div>
        </div>

        <div class="section">
            <div class="section-title">Especificações Técnicas</div>
            <div class="info-box">
                <h3>Sistema Fotovoltaico</h3>
                <p><strong>Potência do Sistema:</strong> {{ $dados['potenciaSistema'] ?? '0,00' }} kW</p>
                <p><strong>Placas Solares:</strong> {{ $dados['quantidadePlacas'] ?? '0' }} x
                    {{ $dados['potenciaPlaca'] ?? '0' }}W</p>
                <p><strong>Produção Estimada:</strong>
                    @if (isset($dados['potenciaSistema']))
                        ~{{ number_format(floatval(str_replace(',', '.', $dados['potenciaSistema'])) * 450, 0, ',', '.') }}
                        kWh/mês
                    @else
                        0 kWh/mês
                    @endif
                </p>
            </div>

            <div class="info-box">
                <h3>Equipamentos do Sistema</h3>
                @if (isset($dados['equipamentos']) && is_array($dados['equipamentos']))
                    <table>
                        <thead>
                            <tr>
                                <th>Equipamento</th>
                                <th>Quantidade</th>
                                <th>Descrição</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dados['equipamentos'] as $nome => $equipamento)
                                <tr>
                                    <td>{{ $nome }}</td>
                                    <td>{{ $equipamento['quantidade'] ?? '0' }}
                                        {{ ($equipamento['quantidade'] ?? 0) > 1 ? 'unidades' : 'unidade' }}</td>
                                    <td>{{ $equipamento['descricao'] ?? '' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>Não há informações de equipamentos disponíveis</p>
                @endif
            </div>
        </div>

        <div class="section">
            <div class="section-title">Considerações</div>
            <div class="info-box">
                <ul>
                    <li>Os valores são estimados com base nas informações fornecidas</li>
                    <li>O projeto final pode sofrer alterações após análise técnica in loco</li>
                    <li>O sistema tem vida útil estimada em 25 anos</li>

                </ul>
            </div>
        </div>

        <div class="footer">
            <p>Proposta válida por 30 dias - {{ date('d/m/Y') }}</p>           
        </div>
    </div>
</body>

</html>
