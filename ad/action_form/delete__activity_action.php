<?php
include_once("./../../connect.php");
$act_id = null;

try {
    $act_id = $_GET["act_id"];

    $sql = "UPDATE `tbl_activity` SET `act_delete` = '1' WHERE `tbl_activity`.`act_id` = '$act_id';";
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
