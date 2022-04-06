<?php

use Core\Framework\Router;
use DI\ContainerBuilder;
use Symfony\Component\Dotenv\Dotenv;

define('DS',DIRECTORY_SEPARATOR);
define('RACINE',dirname(__DIR__).DS);
define('FOLDER_SRC', RACINE.'src'.DS);
define('FOLDER_PUBLIC',RACINE.'Public'.DS);
define('FOLDER_CONTROLLERS',FOLDER_SRC.'Controllers'.DS);
define('FOLDER_CORE',RACINE.'Core'.DS);
define('FOLDER_CONFIG',RACINE.'Config'.DS);
define('FOLDER_MODELS',FOLDER_SRC.'Models'.DS);
define('FOLDER_VIEW',FOLDER_SRC.'View'.DS);
define('FOLDER_VENDOR',RACINE.'vendor'.DS);

require FOLDER_VENDOR."autoload.php";
require FOLDER_VENDOR.'/symfony/dotenv/Dotenv.php';

$dotenv = new Dotenv();
$dotenv->load(FOLDER_CONFIG.'.env');

$builder = new ContainerBuilder();
$builder->useAutowiring(true);
$builder->addDefinitions(FOLDER_CONFIG.'config.php');
$container = $builder->build();
Router::run($container);
