<!DOCTYPE html>
<html lang="en">
<head>
  <?php include('header.php'); ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>ข้อมูลกิจกรรม</title>
    <!-- sweet alert  -->
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h5>ข้อมูลกิจกรรม</h5>
        <div class="table-responsive">
          <table class="table table-striped table-hover table-bordered">
            <thead>
              <tr class="table-danger">
                <th>รหัสกิจกรรม</th>
                <th>ชื่อกิจกรรม</th>
                <th>ปีการศึกษา</th>
                <th>จำนวนชั่วโมง</th>
                <th>วัน</th>
                <th>เวลา</th>
                <th>จำนวนนักศึกษา</th>
                <th>สถานะการจัดกิจกรรม</th>
                <th>ชื่ออาจารย์ผู้จัดกิจกรรม</th>
                <th>เบอร์โทรติดต่อ</th>
                <th>รายละเอียดการจัดกิจกรรม</th>
                <th>จัดการ</th>
              </tr>
            </thead>
            <tbody>
              <?php
              // เรียกไฟล์เชื่อมต่อฐานข้อมูล
              require_once 'connect.php';
              // คิวรี่ข้อมูลจาก tbl_activity
              $stmt = $conn->prepare("SELECT * FROM tbl_activity ORDER BY act_id DESC");
              $stmt->execute();
              $result = $stmt->fetchAll();
              foreach($result as $row) {
              ?>
              <tr>
                <td><?= $row['act_id']; ?></td>
                <td><?= $row['act_name']; ?></td>
                <td><?= $row['act_year']; ?></td>
                <td><?= $row['act_hour']; ?></td>
                <td><?= $row['act_day']; ?></td>
                <td><?= $row['act_time']; ?></td>
                <td><?= $row['act_number']; ?></td>
                <td>
                  <?php
                  // แสดงสถานะการจัดกิจกรรม
                  if ($row['act_status'] == 0) {
                    echo "ยกเลิกการจัดกิจกรรม";
                  } elseif ($row['act_status'] == 1) {
                    echo "กิจกรรมได้จัดขึ้นแล้ว";
                  } elseif ($row['act_status'] == 2) {
                    echo "อยู่ระหว่างการจัดกิจกรรม";
                  } elseif ($row['act_status'] == 3) {
                    echo "สร้าง Token แล้ว";
                  }
                  ?>
                </td>
                <td>
                  <?php
                  // แสดงชื่ออาจารย์ผู้จัดกิจกรรม
                  if ($row['act_lecturer'] == 0) {
                    echo "กรุณาเลือกอาจารย์ผู้จัดกิจกรรม";
                  } elseif ($row['act_lecturer'] == 1) {
                    echo "ผู้ช่วยศาสตราจารย์ ดร.ชรินทร์ญา หวังวัชรกุล";
                  } elseif ($row['act_lecturer'] == 2) {
                    echo "ผู้ช่วยศาสตราจารย์ณิชนันทน์ กะวิวังสกุล";
                  } elseif ($row['act_lecturer'] == 3) {
                    echo "อาจารย์ภัทรณัฐสุดา จารุธีรพันธุ์";
                  } elseif ($row['act_lecturer'] == 4) {
                    echo "อาจารย์ชวลิต ยศสุนทร";
                  } elseif ($row['act_lecturer'] == 5) {
                    echo "อาจารย์ปฐมาวดี คำทอง";
                  } elseif ($row['act_lecturer'] == 6) {
                    echo "อาจารย์วรกร พิมพาคุณ";
                  } elseif ($row['act_lecturer'] == 7) {
                    echo "อาจารย์ไหมคำ ตันติปทุม";
                  }
                  ?>
                </td>
                <td><?= $row['act_phone']; ?></td>
                <td><?= $row['act_details']; ?></td>
                <td>
                  <div class="d-flex">
                    <!-- ปุ่มเข้าร่วมกิจกรรม -->
                    <a href="formEditACT.php?act=edit&act_id=<?= $row['act_id']; ?>" class="btn btn-primary btn-sm me-0">เข้าร่วมกิจกรรม</a>

               
                  
                  </div>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
