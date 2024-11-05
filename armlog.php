<?php
$ip = $_SERVER['REMOTE_ADDR'];
$data = date('Y-m-d H:i:s');
$userAgent = $_SERVER['HTTP_USER_AGENT'];

$logData = [
    "ip" => $ip,
    "data" => $data,
    "userAgent" => $userAgent
];

$arquivoLog = './logs/visitas.json';

// Lê o conteúdo atual do arquivo e decodifica para adicionar um novo log
$logs = json_decode(file_get_contents($arquivoLog), true);
$logs[] = $logData;

// Salva o log atualizado no arquivo JSON
file_put_contents($arquivoLog, json_encode($logs, JSON_PRETTY_PRINT));

echo "Log registrado com sucesso!";
?>
