<?php
include_once("./../../connect.php");
$std_id = null;

try {
    $std_id = $_GET["std_id"];

    $sql = "UPDATE `tbl_std` SET `std_delete` = '1' WHERE `tbl_std`.`std_id` = '$std_id';";
    $insert = $conn->query($sql);
    
    if ($insert) {
        $_SESSION["SUCCESS"] = "บันทึกข้อมูลสำเร็จ";
        unset($_SESSION["ERROR"]);
    } else {
        $_SESSION["ERROR"] = "บันทึกข้อมูลไม่สำเร็จ";
        unset($_SESSION["SUCCESS"]);
    }

    header("Location: ./../Mgstudent.php");
    exit;
} catch (\Throwable $e) {
    $_SESSION["ERROR"] =  $e->getMessage();
    header("Location: ./../Mgstudent.php");
    exit;
}
