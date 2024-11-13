<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include('header.php'); ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>PHP PDO Form Edit Student</title>
    <!-- sweet alert -->
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
  </head>
  <body>

<?php
// เชื่อมต่อฐานข้อมูล
require_once 'connect.php';

// ตรวจสอบว่ามีพารามิเตอร์ std_code ที่ส่งมาหรือไม่
if (isset($_GET['std_code'])) {
    $std_code = $_GET['std_code'];

    // ดึงข้อมูลนักศึกษาจากฐานข้อมูล
    $stmt = $conn->prepare("SELECT * FROM tbl_std WHERE std_code = :std_code");
    $stmt->bindParam(':std_code', $std_code, PDO::PARAM_STR);
    $stmt->execute();
    $student = $stmt->fetch(PDO::FETCH_ASSOC);

    // ตรวจสอบว่าพบข้อมูลหรือไม่
    if (!$student) {
        echo "ไม่พบข้อมูลนักศึกษานี้";
        exit();
    }
} else {
    echo "ไม่มีรหัสนักศึกษาที่ระบุ";
    exit();
}

// ตรวจสอบการอัปเดตข้อมูลเมื่อส่งฟอร์ม
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $std_code = $_POST['std_code'];
    $std_group = $_POST['std_group'];
    $std_program = $_POST['std_program'];
    $std_prefix = $_POST['std_prefix'];
    $std_name = $_POST['std_name'];
    $std_lastname = $_POST['std_lastname'];
    $std_phone = $_POST['std_phone'];
    $std_email = $_POST['std_email'];

    // คำสั่ง SQL สำหรับอัปเดตข้อมูล
    $stmt = $conn->prepare("UPDATE tbl_std SET 
        std_group = :std_group,
        std_program = :std_program,
        std_prefix = :std_prefix,
        std_name = :std_name,
        std_lastname = :std_lastname,
        std_phone = :std_phone,
        std_email = :std_email
        WHERE std_code = :std_code");

    // ผูกค่ากับพารามิเตอร์
    $stmt->bindParam(':std_code', $std_code, PDO::PARAM_STR);
    $stmt->bindParam(':std_group', $std_group, PDO::PARAM_STR);
    $stmt->bindParam(':std_program', $std_program, PDO::PARAM_STR);
    $stmt->bindParam(':std_prefix', $std_prefix, PDO::PARAM_STR);
    $stmt->bindParam(':std_name', $std_name, PDO::PARAM_STR);
    $stmt->bindParam(':std_lastname', $std_lastname, PDO::PARAM_STR);
    $stmt->bindParam(':std_phone', $std_phone, PDO::PARAM_STR);
    $stmt->bindParam(':std_email', $std_email, PDO::PARAM_STR);

    // ตรวจสอบผลการอัปเดต
    if ($stmt->execute()) {
        echo '<script>
            setTimeout(function() {
                swal({
                    title: "แก้ไขข้อมูลสำเร็จ",
                    type: "success"
                }, function() {
                    window.location = "formAddSTD.php"; // หน้าฟอร์มแก้ไขสำเร็จ
                });
            }, 1000);
        </script>';
    } else {
        echo '<script>
            setTimeout(function() {
                swal({
                    title: "เกิดข้อผิดพลาดในการแก้ไขข้อมูล",
                    type: "error"
                }, function() {
                    window.location = "formAddSTD.php"; // หน้าฟอร์มแก้ไข
                });
            }, 1000);
        </script>';
    }
}
?>

<div class="container">
    <h3>ฟอร์มแก้ไขข้อมูลนักศึกษา</h3>
    <form method="post">
        <input type="hidden" name="std_code" value="<?= htmlspecialchars($student['std_code']) ?>">

        <div class="mb-3">
            <label>โปรแกรมการศึกษา</label>
            <select name="std_program" class="form-control" required>
                <option value="ภาคปกติ" <?= $student['std_program'] == 'ภาคปกติ' ? 'selected' : '' ?>>ภาคปกติ</option>
                <option value="ภาคกศบ." <?= $student['std_program'] == 'ภาคกศบ.' ? 'selected' : '' ?>>ภาคกศบ.</option>
            </select>
        </div>

        <div class="mb-3">
            <label>หมู่เรียน</label>
            <input type="text" name="std_group" class="form-control" value="<?= htmlspecialchars($student['std_group']) ?>" required>
        </div>

        <div class="mb-3">
            <label>คำนำหน้าชื่อ</label>
            <select name="std_prefix" class="form-control" required>
                <option value="นาย" <?= $student['std_prefix'] == 'นาย' ? 'selected' : '' ?>>นาย</option>
                <option value="นางสาว" <?= $student['std_prefix'] == 'นางสาว' ? 'selected' : '' ?>>นางสาว</option>
                <option value="นาง" <?= $student['std_prefix'] == 'นาง' ? 'selected' : '' ?>>นาง</option>
            </select>
        </div>

        <div class="mb-3">
            <label>ชื่อ</label>
            <input type="text" name="std_name" class="form-control" value="<?= htmlspecialchars($student['std_name']) ?>" required>
        </div>

        <div class="mb-3">
            <label>นามสกุล</label>
            <input type="text" name="std_lastname" class="form-control" value="<?= htmlspecialchars($student['std_lastname']) ?>" required>
        </div>

        <div class="mb-3">
            <label>เบอร์โทรศัพท์</label>
            <input type="text" name="std_phone" class="form-control" value="<?= htmlspecialchars($student['std_phone']) ?>" required>
        </div>

        <div class="mb-3">
            <label>อีเมล</label>
            <input type="email" name="std_email" class="form-control" value="<?= htmlspecialchars($student['std_email']) ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">บันทึกการแก้ไข</button>
        <a href="formAddSTD.php" class="btn btn-secondary">ยกเลิก</a>
    </form>
</div>

</body>
</html>