<?php
// Arquivo de log onde as visitas serão registradas
$arquivoLog = './logs/visitas.log';

// Dados do visitante
$ip = $_SERVER['REMOTE_ADDR'];
$userAgent = $_SERVER['HTTP_USER_AGENT'];
$dataHora = date('Y-m-d H:i:s');

// Formato do registro
$registro = "IP: $ip | Data/Hora: $dataHora | Navegador: $userAgent\n";

// Salva o registro no arquivo
file_put_contents($arquivoLog, $registro, FILE_APPEND);

echo "Visita registrada com sucesso.";
?>
