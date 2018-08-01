<?php
define("DB_HOST", 'localhost');
define("DB_USER", 'root');
define("DB_PASS", '');
define("DB_NAME", 'verdirf');

define('DIR', pathinfo($_SERVER['SCRIPT_FILENAME'], PATHINFO_DIRNAME) . '/');
define('SCHEME', (is_null($_SERVER['REQUEST_SCHEME']) ? 'http' : $_SERVER['REQUEST_SCHEME']) . '://');
define('DOMAIN', $_SERVER['SERVER_NAME'] . '/');
define('SUBDOMAIN', str_replace('/index.php', '', $_SERVER['SCRIPT_NAME']) != '' ?
    str_replace('/index.php', '', $_SERVER['SCRIPT_NAME']) . '/' : '');
define('MAIN', SCHEME . str_replace('//', '/', DOMAIN . SUBDOMAIN));
