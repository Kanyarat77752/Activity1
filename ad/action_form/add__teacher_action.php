<?php
include_once("./../../connect.php");

$thc_fname = null;
$thc_lname = null;
$thc_phone = null;
$tch_mail = null;
$tch_pass = null;

try {

    $thc_fname = $_POST["thc_fname"];
    $thc_lname = $_POST["thc_lname"];
    $thc_phone = $_POST["thc_phone"];
    $tch_mail = $_POST["tch_mail"];
    $tch_pass = $_POST["tch_pass"];

    $sql = "INSERT INTO `tbl_tch` (`tch_id`, `thc_fname`, `thc_lname`, `thc_phone`, `tch_mail`, `tch_pass`, `thc_delete`) 
                                VALUES (NULL,'$thc_fname', '$thc_lname', '$thc_phone', '$tch_mail', '$tch_pass', NULL);";
    $insert = $conn->query($sql);
    if ($insert) {
        $_SESSION["SUCCESS"] = "บันทึกข้อมูลสำเร็จ";
        unset($_SESSION["ERROR"]);
    } else {
        $_SESSION["ERROR"] = "บันทึกข้อมูลไม่สำเร็จ";
        unset($_SESSION["SUCCESS"]);
    }

    header("Location: ./../Mgteacher.php");
    exit;
} catch (\Throwable $e) {
    $_SESSION["ERROR"] =  $e->getMessage();
    header("Location: ./../Mgteacher.php");
    exit;
}
