<?php
include_once("./../../connect.php");
if (isset($_POST["username"]) && isset($_POST["password"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $_row =  $conn->query("SELECT * FROM `tbl_std` WHERE std_code='$username' AND  std_pass='$password'", PDO::FETCH_OBJ)->fetch(PDO::FETCH_OBJ);
    if ($_row) {

        $_SESSION["USER"] = $_row;
        $_SESSION["USER_TYPE"] = "STD";


        header("Location: ./../index.php");
        exit();
    } else {
        header("Location: ./../login.php");
        exit();
    }
}

header("Location: ./../login.php");
exit();
