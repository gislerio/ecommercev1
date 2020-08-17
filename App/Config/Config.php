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



/* define("MAIL", [
    "host" => "smtp.gmail.com",
    "port" => "587",
    "user" => "email",
    "passwd" => "senha",
    "from_nome"=>"nome",
    "from_email" => "email"
]); */