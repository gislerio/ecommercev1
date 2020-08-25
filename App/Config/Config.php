<?php
date_default_timezone_set('America/Sao_Paulo');
setlocale(LC_TIME, 'pt_BR', 'pt_BR.uft-8', 'portuguese');

$envPath = realpath(dirname(__FILE__) . '/env.ini');
//echo $envPath;
$env = parse_ini_file($envPath);

define("DATA_ENV", [
    "host" => "{$env['host']}",
    "database" => "{$env['database']}",
    "username" => "{$env['username']}",
    "password" => "{$env['password']}"
]);

$envMailPath = realpath(dirname(__FILE__) . '/mail.ini');
//echo $envPath;
$envMail = parse_ini_file($envMailPath);

define("MAIL_ENV", [
    "host" => "{$envMail['host']}",
    "port" => "{$envMail['port']}",
    "userName" => "{$envMail['userName']}",
    "password" => "{$envMail['password']}",
    "setFrom" => "{$envMail['setFrom']}"
]);
