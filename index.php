<?php

    const QW = true;

    try{

        require_once __DIR__ . '/vendor/autoload.php';
        require_once __DIR__ . '/config.php';

    }catch(ExceptionHandler $e)
    {
        echo '<pre>';
        print_r($e);
        echo '</pre>';
    }