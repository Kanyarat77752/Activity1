<!DOCTYPE html>
<html lang="th">
  <head>
    <?php include('header.php'); ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>แก้ไขข้อมูลนักศึกษา</title>
    <!-- sweet alert  -->
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
        echo "ไม่พบข้อมูลนักศึกษา";
        exit();
    }
} else {
    echo "ไม่มีรหัสนักศึกษาที่ระบุ";
    exit();
}

// ตรวจสอบการอัปเดตข้อมูลเมื่อส่งฟอร์ม
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
        echo '<script>alert("แก้ไขข้อมูลสำเร็จ"); window.location.href = "formAddSTD.php";</script>';
    } else {
        echo '<script>alert("เกิดข้อผิดพลาดในการแก้ไขข้อมูล");</script>';
    }
}
?>

<div class="container">
    <h3>ฟอร์มแก้ไขข้อมูลนักศึกษา</h3>
    <form method="post">
        <div class="row mb-3">
            <div class="col col-sm-2">
                เลือกโปรแกรม
                <select name="std_program" class="form-control" required>
                    <option value="">-เลือกโปรแกรม-</option>
                    <option value="ภาคปกติ" <?= $student['std_program'] == 'ภาคปกติ' ? 'selected' : '' ?>>ภาคปกติ</option>
                    <option value="ภาคกศบ." <?= $student['std_program'] == 'ภาคกศบ.' ? 'selected' : '' ?>>ภาคกศบ.</option>
                </select>
            </div>

            <div class="col col-sm-5">
                รหัสนักศึกษา
                <input type="text" name="std_code" class="form-control" value="<?= $student['std_code'] ?>" readonly>
            </div>
            <div class="col col-sm-5">
                หมู่เรียน
                <input type="text" name="std_group" class="form-control" value="<?= $student['std_group'] ?>" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col col-sm-2">
                คำนำหน้าชื่อ
                <select name="std_prefix" class="form-control" required>
                    <option value="">-คำนำหน้าชื่อ-</option>
                    <option value="นาย" <?= $student['std_prefix'] == 'นาย' ? 'selected' : '' ?>>นาย</option>
                    <option value="นางสาว" <?= $student['std_prefix'] == 'นางสาว' ? 'selected' : '' ?>>นางสาว</option>
                    <option value="นาง" <?= $student['std_prefix'] == 'นาง' ? 'selected' : '' ?>>นาง</option>
                </select>
            </div>

            <div class="col col-sm-4">
                ชื่อ
                <input type="text" name="std_name" class="form-control" value="<?= $student['std_name'] ?>" required>
            </div>
            <div class="col col-sm-6">
                นามสกุล
                <input type="text" name="std_lastname" class="form-control" value="<?= $student['std_lastname'] ?>" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                เบอร์โทร
                <input type="tel" name="std_phone" class="form-control" value="<?= $student['std_phone'] ?>" required minlength="10" maxlength="10">
            </div>
            <div class="col">
                อีเมล
                <input type="email" name="std_email" class="form-control" value="<?= $student['std_email'] ?>" required>
            </div>
        </div>
        <div class="d-grid gap-2 col-12 mx-auto">
            <button type="submit" class="btn btn-primary">บันทึกการแก้ไข</button>
            <a href="formAddSTD.php" class="btn btn-secondary">ยกเลิก</a>
        </div>


    </form>
</div>

</body>
</html>
