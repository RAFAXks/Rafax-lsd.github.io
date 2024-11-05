<?php
// gerar_log_html.php

$arquivoLog = './logs/visitas.log';
$arquivoHtml = './loggs.html';

// Verifica se o arquivo de log existe e é legível
if (file_exists($arquivoLog) && is_readable($arquivoLog)) {
    // Lê o conteúdo do log
    $conteudoLog = htmlspecialchars(file_get_contents($arquivoLog));

    // Conteúdo HTML com estilo e tabela para exibir o log
    $conteudoHtml = '
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logs de Visitas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1a1a1a;
            color: #ddd;
            text-align: center;
        }
        h1 {
            color: #8a2be2;
        }
        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
            margin-top: 20px;
            color: #ddd;
        }
        th, td {
            padding: 10px;
            border: 1px solid #444;
            text-align: left;
        }
        th {
            background-color: #333;
            color: #8a2be2;
        }
        tr:nth-child(even) {
            background-color: #222;
        }
    </style>
</head>
<body>
    <h1>Logs de Visitas</h1>
    <table>
        <tr>
            <th>Log</th>
        </tr>';

    // Adiciona cada linha do log em uma linha da tabela
    foreach (explode("\n", $conteudoLog) as $linha) {
        if (trim($linha) !== '') {
            $conteudoHtml .= '<tr><td>' . $linha . '</td></tr>';
        }
    }

    $conteudoHtml .= '
    </table>
</body>
</html>';

    // Salva o conteúdo HTML no arquivo loggs.html
    file_put_contents($arquivoHtml, $conteudoHtml);
    echo "Arquivo HTML gerado com sucesso!";
} else {
    echo "Erro: O arquivo de log não foi encontrado ou não é legível.";
}
