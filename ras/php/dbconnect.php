<?php
//error_reporting(0);
ob_start();
session_start();


//DEFINE("BASE_URL","http://cipetbhopal.com/");
DEFINE("BASE_URL","http://rh.campresjonlline.net/");

DEFINE ('DB_USER', 'cp1519775p16_root');
DEFINE ('DB_PSWD', 'J-}%[#D(.&sW');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'cp1519775p16_rh');

date_default_timezone_set('Africa/Douala');

$conn =  new mysqli(DB_HOST,DB_USER,DB_PSWD,DB_NAME);
if($conn->connect_error)
    die("Failed to connect database ".$conn->connect_error );
