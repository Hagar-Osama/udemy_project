<?php
/*
app info
*/
define('APP_DESCRIPTION', 'free and paid tutorials');

if ($_SERVER['SERVER_NAME'] == 'udemy_clone_project.local') {
        //root path e.g localhost
    define('ROOT', 'http://udemy_clone_project.local');

    define('HOST', 'localhost');
    define('DBNAME', 'udemy_clone');
    define('DBDRIVER', 'mysql');
    define('USER', 'root');
    define('PASSWORD', '');
    define('APP_NAME', 'Udemy Clone Website');
    define('DEBUG', true);
} else {
        //root path e.g. www.udemy.com
    define('ROOT', 'http://udemy_clone_project.local');

    define('HOST', 'localhost');
    define('DBNAME', 'udemy_clone');
    define('DBDRIVER', 'mysql');
    define('USER', 'root');
    define('PASSWORD', '');
    define('APP_NAME', 'Udemy Clone Website');
    define('DEBUG', true);
 

}
