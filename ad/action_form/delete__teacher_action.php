<?php
include_once("./../../connect.php");
$tch_id = null;

try {
    $tch_id = $_GET["tch_id"];

    $sql = "UPDATE `tbl_tch` SET `thc_delete` = '1' WHERE `tbl_tch`.`tch_id` = '$tch_id';";
    $insert = $conn->query($sql);

    if ($insert) {
        $_SESSION["SUCCESS"] = "บันทึกข้อมูลสำเร็จ";
        unset($_SESSION["ERROR"]);
    } else {
        $_SESSION["ERROR"] = "บันทึกข้อมูลไม่สำเร็จ";
        unset($_SESSION["SUCCESS"]);
    }

    header("Location: ./../Mgactivity.php");
    exit;
} catch (\Throwable $e) {
    $_SESSION["ERROR"] =  $e->getMessage();
    header("Location: ./../Mgactivity.php");
    exit;
}
