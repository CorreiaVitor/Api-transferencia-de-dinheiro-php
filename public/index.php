<?php

use App\Core\Core;
use App\Http\Routes;
use Dotenv\Dotenv;

require_once dirname(__DIR__) . '/vendor/autoload.php';
require_once dirname(__DIR__) . '/src/Routes/api.php';

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

Core::dispatch(Routes::routes());