<?php
include_once("./../../connect.php");

$tch_id = null;
$thc_fname = null;
$thc_lname = null;
$thc_phone = null;
$tch_mail = null;
$tch_pass = null;

try {

    $tch_id = $_GET["tch_id"];
    $thc_fname = $_POST["thc_fname"];
    $thc_lname = $_POST["thc_lname"];
    $thc_phone = $_POST["thc_phone"];
    $tch_mail = $_POST["tch_mail"];
    $tch_pass = $_POST["tch_pass"];
    
    $sql = "UPDATE `tbl_tch` SET        
                                        `thc_fname` = '$thc_fname', 
                                        `thc_lname` = '$thc_lname', 
                                        `thc_phone` = '$thc_phone', 
                                        `tch_mail` = '$tch_mail' ,
                                        `tch_pass` = '$tch_pass'
                                    WHERE `tbl_tch`.`tch_id` = '$tch_id'";

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
