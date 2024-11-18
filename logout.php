<?php
include_once("./connect.php");

$PATH = './';

if (!isset($_SESSION["USER_TYPE"])) {
    session_destroy();
    header("Location: ./index.php");
    exit();
}

switch ($_SESSION["USER_TYPE"]) {
    case 'AD':
        $PATH .= "ad/login.php";
        break;
    case 'STD':
        $PATH .= "std/login.php";
        break;
    case 'TCH':
        $PATH .= "tch/login.php";
        break;

    default:
        session_destroy();
        header("Location: ./index.php");
}
session_destroy();

header("Location: $PATH");
exit();
