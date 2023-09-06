<?php

use App\Factories\Logger\File\FileLogMenager;
use App\Models\Log;

require '../../vendor/autoload.php';

$path = '../../storage/logs/log.txt';
$logManager = new FileLogMenager($path);
$logManager->log(Log::LOG_FATAL, 'Houve algum erro no sistema');
$logManager->log(Log::LOG_WARNING, 'Algum alerta do sistema');
$logManager->log(Log::LOG_NOTICE, 'Alguma notificação do sistema');
