<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

ini_set('memory_limit', '-1');
set_time_limit(0);

$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));

if( !empty($cleardb_url["scheme"]) && !empty($cleardb_url["host"]) ){

    define('DB_SERVERNAME', $cleardb_url["host"]);
    define('DB_USERNAME', $cleardb_url["user"]);
    define('DB_PASSWORD', $cleardb_url["pass"]);
    define('DB_NAME', substr($cleardb_url["path"],1) );

}else{
    define('DB_SERVERNAME', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'heroku_144250d53156194');
}

define('ABSPATH', dirname(__FILE__) . '/');

$years = array(2014,2015,2016,2017,2018,2019,2020);
$months = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');

include 'includes/autoload.inc.php';

?>