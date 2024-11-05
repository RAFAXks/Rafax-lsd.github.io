<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logs de Visitas</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #1a1a1a;
            color: #e0e0e0;
            text-align: center;
            padding: 20px;
        }
        h1 {
            color: #8a2be2;
            margin-bottom: 30px;
            font-size: 2em;
        }
        .table-container {
            margin: 0 auto;
            max-width: 800px;
            overflow-x: auto;
            background-color: rgba(34, 34, 34, 0.9);
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #6a0d91;
            color: #ffffff;
            font-weight: 700;
        }
        td {
            background-color: #2d2d2d;
            color: #b3b3b3;
        }
        tr:nth-child(even) td {
            background-color: #3a3a3a;
        }
    </style>
</head>
<body>
    <h1>Logs de Visitas</h1>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>IP</th>
                    <th>Data/Hora</th>
                    <th>Navegador</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $arquivoLog = './logs/visitas.log';

                if (file_exists($arquivoLog) && is_readable($arquivoLog)) {
                    // Lê o conteúdo do arquivo de log linha por linha
                    $linhas = file($arquivoLog, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                    
                    foreach ($linhas as $linha) {
                        // Divide cada linha em campos (assumindo que estão no formato IP | Data/Hora | Navegador)
                        $dados = explode('|', $linha);

                        // Remove espaços extras em volta dos valores
                        $dados = array_map('trim', $dados);

                        if (count($dados) == 3) { // Garante que há 3 campos
                            echo "<tr>";
                            echo "<td>{$dados[0]}</td>"; // IP
                            echo "<td>{$dados[1]}</td>"; // Data/Hora
                            echo "<td>{$dados[2]}</td>"; // Navegador
                            echo "</tr>";
                        }
                    }
                } else {
                    echo "<tr><td colspan='3'>Erro: O arquivo de log não foi encontrado ou não é legível.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
