<?php
include_once("./../../connect.php");


// print_r($_POST);
// Array ( [act_name] => ddddd [act_year] => 2564 [act_hour] => 3 [act_number] => 50 [act_day] => 2024-11-22 [act_time] => 08.00-12.00 [tch_id] => 1 )


$act_name = null;
$act_year = null;
$act_hour = null;
$act_number = null;
$act_day = null;
$act_time = null;
$tch_id = null;

try {
    $act_name = $_POST["act_name"];
    $act_year = $_POST["act_year"];
    $act_hour = $_POST["act_hour"];
    $act_number = $_POST["act_number"]; // นักศึกษา
    $act_day = $_POST["act_day"];
    $act_time = $_POST["act_time"];
    $tch_id = $_POST["tch_id"];
    $act_details = $_POST["act_details"];

    $tbl_tch = $conn->query("SELECT * FROM `tbl_tch` WHERE  tch_id='$tch_id'", PDO::FETCH_OBJ)->fetch(PDO::FETCH_OBJ);
    $act_phone = $tbl_tch->thc_phone ?? '';

    $sql = "INSERT INTO `tbl_activity` (`act_id`, `act_name`, `act_year`, `act_hour`, `act_day`, `act_time`, `act_number`, `act_status`, `tch_id`, `act_phone`, `act_details`, `act_delete`, `adm_id`, `act_stamp`) 
                        VALUES (NULL, '$act_name', '$act_year', '$act_hour', '$act_day', '$act_time', '$act_number', '1', '$tch_id', '$act_phone', '$act_details', NULL, '1', current_timestamp());";
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
