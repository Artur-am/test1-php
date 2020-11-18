<?php if(false===defined('QW'))exit;

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

session_start();

#DATABASE
    const DB_HOST = 'localhost';
    const DB_NAME = 'test1';
    const DB_USER = 'root';
    const DB_PASS = '94-AM-mysql_admin-&';
#PATHS
    const PATH = __DIR__ . '/app/';
    const PATH_THEME = __DIR__ . '/views/default/';

    define('PATH_CORE', PATH . 'core/');
    define('PATH_CONTROLLERS', PATH . 'controllers/');
    define('PATH_MODULES', PATH . 'models/');
    define('THEME_SRC', $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'].'/views/default/');
#REQUIRE
    require_once PATH_CORE . 'database/db_Mysqli.php';
    require_once PATH_CORE . 'database/sql.php';
    // require_once PATH_CORE . 'database/migrations.php';
    require_once PATH_CORE . 'controller.php';
    require_once PATH_CORE . 'model.php';
    require_once PATH_CORE . 'router.php';
    require_once PATH_CORE . 'view.php';