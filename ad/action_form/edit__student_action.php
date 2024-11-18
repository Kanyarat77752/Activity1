<?php
include_once("./../../connect.php");

$std_id = null;
$std_code = null;
$std_group = null;
$std_program = null;
$std_prefix = null;
$std_name = null;
$std_lastname = null;
$std_phone = null;
$std_email = null;
$std_pass = null;



try {

    $std_id = $_GET["std_id"];

    $std_code = $_POST["std_code"];
    $std_group = $_POST["std_group"];
    $std_program = $_POST["std_program"];
    $std_prefix = $_POST["std_prefix"]; 
    $std_name = $_POST["std_name"];
    $std_lastname = $_POST["std_lastname"];
    $std_phone = $_POST["std_phone"];
    $std_email = $_POST["std_email"];
    $std_pass = $_POST["std_pass"];
    


    $sql = "UPDATE `tbl_std` SET        `std_code` = '$std_code', 
                                        `std_group` = '$std_group',   
                                        `std_program` = '$std_program', 
                                        `std_name` = '$std_name', 
                                        `std_lastname` = '$std_lastname', 
                                        `std_prefix` = '$std_prefix', 
                                        `std_phone` = '$std_phone', 
                                        `std_email` = '$std_email' ,
                                        `std_pass` = '$std_pass'
                                    WHERE `tbl_std`.`std_id` = '$std_id'";

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
