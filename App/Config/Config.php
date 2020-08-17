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
    "user" => "gisleriojunior@gmail.com",
    "passwd" => "@Gm8714 *",
    "from_nome"=>"Gislerio Junior",
    "from_email" => "gisleriojunior@gmail.com"
]); */