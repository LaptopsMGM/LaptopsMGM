<?php
# Activamos reporte de todos los errores
error_reporting (E_ALL | E_STRICT);
/* RUTAS */
define('HOME', 'C:\xampp\htdocs');
define('APP_NAME', 'laptops');
define('APP', HOME . DIRECTORY_SEPARATOR . APP_NAME );

/* SISTEMA */ 
define('SYS', APP . DIRECTORY_SEPARATOR . 'system');
define('URL', 'http://localhost');
define('URL_BASE', URL .'/'.APP_NAME);

/* 4 CAPAS  - MVC */ 
define('VIS', APP . DIRECTORY_SEPARATOR . 'vista');
define('MOD', APP . DIRECTORY_SEPARATOR . 'modelo');
define('CON', APP . DIRECTORY_SEPARATOR . 'controlador');

define('PER', APP . DIRECTORY_SEPARATOR . 'persistencia');
