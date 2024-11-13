<!DOCTYPE html>
<html lang="en">
  <head>
  <?php include('header.php'); ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>PHP PDO Form add Student by devbanban.com 2022</title>
    <!-- sweet alert  -->
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">


  </head>
  <body>

<?php
// เชื่อมต่อฐานข้อมูล
require_once 'connect.php';

// ตรวจสอบว่ามีพารามิเตอร์ act_id ที่ส่งมาหรือไม่
if (isset($_GET['act_id'])) {
    $act_id = $_GET['act_id'];

    // ดึงข้อมูลกิจกรรมจากฐานข้อมูล
    $stmt = $conn->prepare("SELECT * FROM tbl_activity WHERE act_id = :act_id");
    $stmt->bindParam(':act_id', $act_id, PDO::PARAM_INT);
    $stmt->execute();
    $activity = $stmt->fetch(PDO::FETCH_ASSOC);

    // ตรวจสอบว่าพบข้อมูลหรือไม่
    if (!$activity) {
        echo "ไม่พบข้อมูลกิจกรรม";
        exit();
    }
} else {
    echo "ไม่มีรหัสกิจกรรมที่ระบุ";
    exit();
}

// ตรวจสอบการอัปเดตข้อมูลเมื่อส่งฟอร์ม
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $act_name = $_POST['act_name'];
    $act_year = $_POST['act_year'];
    $act_hour = $_POST['act_hour'];
    $act_day = $_POST['act_day'];
    $act_time = $_POST['act_time'];
    $act_number = $_POST['act_number'];
    $act_status = $_POST['act_status'];
    $act_lecturer = $_POST['act_lecturer'];
    $act_phone = $_POST['act_phone'];
    $act_details = $_POST['act_details'];

    // คำสั่ง SQL สำหรับอัปเดตข้อมูล
    $stmt = $conn->prepare("UPDATE tbl_activity SET 
        act_name = :act_name,
        act_year = :act_year,
        act_hour = :act_hour,
        act_day = :act_day,
        act_time = :act_time,
        act_number = :act_number,
        act_status = :act_status,
        act_lecturer = :act_lecturer,
        act_phone = :act_phone,
        act_details = :act_details
        WHERE act_id = :act_id");

    // ผูกค่ากับพารามิเตอร์
    $stmt->bindParam(':act_id', $act_id, PDO::PARAM_INT);
    $stmt->bindParam(':act_name', $act_name, PDO::PARAM_STR);
    $stmt->bindParam(':act_year', $act_year, PDO::PARAM_STR);
    $stmt->bindParam(':act_hour', $act_hour, PDO::PARAM_INT);
    $stmt->bindParam(':act_day', $act_day, PDO::PARAM_STR);
    $stmt->bindParam(':act_time', $act_time, PDO::PARAM_STR);
    $stmt->bindParam(':act_number', $act_number, PDO::PARAM_INT);
    $stmt->bindParam(':act_status', $act_status, PDO::PARAM_STR);
    $stmt->bindParam(':act_lecturer', $act_lecturer, PDO::PARAM_STR);
    $stmt->bindParam(':act_phone', $act_phone, PDO::PARAM_STR);
    $stmt->bindParam(':act_details', $act_details, PDO::PARAM_STR);

    // ตรวจสอบผลการอัปเดต
    if ($stmt->execute()) {
        echo '<script>alert("แก้ไขข้อมูลสำเร็จ"); window.location.href = "formAddACT.php";</script>';
    } else {
        echo '<script>alert("เกิดข้อผิดพลาดในการแก้ไขข้อมูล");</script>';
    }
}
?>

<div class="container">
    <h3>ฟอร์มแก้ไขข้อมูลกิจกรรม</h3>
    <form method="post">
        <div class="mb-3">
            <label>ชื่อกิจกรรม</label>
            <input type="text" name="act_name" class="form-control" value="<?= $activity['act_name'] ?>" required>
        </div>
        <div class="mb-3">
            <label>ปีการศึกษา</label>
            <input type="text" name="act_year" class="form-control" value="<?= $activity['act_year'] ?>" required>
        </div>
        <div class="mb-3">
            <label>จำนวนชั่วโมง</label>
            <input type="number" name="act_hour" class="form-control" value="<?= $activity['act_hour'] ?>" required>
        </div>
        <div class="mb-3">
            <label>วัน</label>
            <input type="date" name="act_day" class="form-control" value="<?= $activity['act_day'] ?>" required>
        </div>
        <div class="mb-3">
            <label>เวลา</label>
            <input type="text" name="act_time" class="form-control" value="<?= $activity['act_time'] ?>" required>
        </div>
        <div class="mb-3">
            <label>จำนวนนักศึกษา</label>
            <input type="number" name="act_number" class="form-control" value="<?= $activity['act_number'] ?>" required>
        </div>
        <div class="mb-3">
            <label>สถานะการจัดกิจกรรม</label>
            <select name="act_status" class="form-control" required>
                <option value="1" <?= $activity['act_status'] == 1 ? 'selected' : '' ?>>กิจกรรมอยู่ระหว่างดำเนินการ</option>
                <option value="2" <?= $activity['act_status'] == 2 ? 'selected' : '' ?>>กิจกรรมได้จัดขึ้นแล้ว</option>
                <option value="3" <?= $activity['act_status'] == 3 ? 'selected' : '' ?>>สร้าง Token แล้ว</option>
                <option value="0" <?= $activity['act_status'] == 0 ? 'selected' : '' ?>>ยกเลิกกิจกรรม</option>
            </select>
        </div>
        <div class="mb-3">
            <label>ชื่ออาจารย์ผู้จัดกิจกรรม</label>
            <input type="text" name="act_lecturer" class="form-control" value="<?= $activity['act_lecturer'] ?>" required>
        </div>
        <div class="mb-3">
            <label>เบอร์โทรติดต่อ</label>
            <input type="text" name="act_phone" class="form-control" value="<?= $activity['act_phone'] ?>" required>
        </div>
        
        <div class="mb-3">
            <label>รายละเอียดการจัดกิจกรรม</label>
            <input type="text" name="act_details" class="form-control" value="<?= $activity['act_details'] ?>" required>
        </div>

        
        <button type="submit" class="btn btn-primary">บันทึกการแก้ไข</button>
        <a href="formAddACT.php" class="btn btn-secondary">ยกเลิก</a>
    </form>
</div>
</body>
</html>
