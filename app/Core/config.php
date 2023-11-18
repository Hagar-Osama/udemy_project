<?php

define('ROOT', 'http://localhost/undemy_clone_project/public');
define('HOST', 'localhost');
define('DBNAME', 'udemy_clone');
define('DBDRIVER', 'mysql');
define('USER', 'root');
define('PASSWORD', '');
define('APP_NAME', 'udemy website');
define('DEBUG', true);

if($_SERVER['SERVER_NAME'] == 'localhost') {
define('ROOT', 'http://localhost/undemy_clone_project/public');
define('HOST', 'localhost');
define('DBNAME', 'udemy_clone');
define('DBDRIVER', 'mysql');
define('USER', 'root');
define('PASSWORD', '');
define('APP_NAME', 'udemy website');
define('DEBUG', true);
}else {

}