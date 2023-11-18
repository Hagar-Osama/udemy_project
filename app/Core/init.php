<?php
spl_autoload_register(function($className) {
require "../app/Models/". ucfirst($className). ".php";
});
require "config.php";
require "functions.php";
require "Database.php";
require "Model.php";
require "Controller.php";
require "App.php";
//core folder for the files that needed to be always running 