<?php 

use Dotenv\Dotenv;

require_once __DIR__ . '/../src/Support/helpers.php';
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../routes/web.php';

$env = Dotenv::createImmutable(base_path());
$env->load();

app()->run();

