<?php if(false===defined('QW'))exit;

error_reporting( -1 );

#DATABASE
    const DB_HOST = 'localhost';
    const DB_NAME = 'test--mysql';
    const DB_USER = 'root';
    const DB_PASS = '';
#PATHS
    const PATH = __DIR__ . '/app/';
    const PATH_THEME = __DIR__ . '/views/';

    define(PATH_CORE, PATH . 'core/');
    define(PATH_CONTROLLERS, PATH . 'controllers/');
    define(PATH_MODULES, PATH . 'modules/');
#REQUIRE
    require_once PATH_CORE . '/controller.php';
    require_once PATH_CORE . '/module.php';
    require_once PATH_CORE . '/router.php';
    require_once PATH_CORE . '/view.php';