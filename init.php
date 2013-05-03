<?php
session_start();

define('ABSPATH', dirname(__FILE__));

$config = require_once('configuration.php');
require_once('functions.php');

function __autoload($class)
{
    $path = ABSPATH . '/classes/';
    $path .= str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';

    if (file_exists($path)) {
        require_once($path);
    }
}

$securityLevel = (isset($_COOKIE['security'])) ? $_COOKIE['security'] : 0;
$hintLevel = (isset($_COOKIE['hints'])) ? $_COOKIE['hints'] : 0;

if (!isset($_COOKIE['security'])) { setcookie('security', $securityLevel); }
if (!isset($_COOKIE['hints'])) { setcookie('hints', $hintLevel); }

if (isset($_GET['toggle'])) {
    switch ($_GET['toggle']) {
        case 'security':
            if ($_COOKIE['security'] == 0) {
                $securityLevel = 1;
            } else if ($_COOKIE['security'] == 1) {
                $securityLevel = 10;
            } else {
                $securityLevel = 0;
            }
            setcookie('security', $securityLevel);
            header('Location: ' . $_SERVER['SCRIPT_NAME']);
            break;
        case 'hints':
            if ($_COOKIE['hints'] == 0) {
                $hintLevel = 1;
            } else if ($_COOKIE['hints'] == 1) {
                $hintLevel = 2;
            } else {
                $hintLevel = 0;
            }
            setcookie('hints', $hintLevel);
            header('Location: ' . $_SERVER['SCRIPT_NAME']);
            break;
        default;
    }
}

$db = new Database();

$user = new User;
$isLoggedIn = $user->isLoggedIn();
if ($isLoggedIn) {
    $user->loadPublicData();
}