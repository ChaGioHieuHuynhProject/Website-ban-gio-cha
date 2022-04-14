<?php
session_start();

require_once "Core/App.php";
require_once "Core/Controller.php";
require_once "Core/Model.php";
require_once "Core/Functions.php";

require_once realpath(__DIR__ . '/vendor/autoload.php');
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
$app = new App();
