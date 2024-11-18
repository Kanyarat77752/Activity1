<!DOCTYPE html>
<html lang="en">
<?php require_once("./head.php") ?>

<body>
    <?php require_once("./header.php") ?>

    <!-- ======= Sidebar ======= -->
    <!-- End Sidebar-->

    <main id="main" class="main">
        <!-- ที่เขียนโค้ด -->
        <table class="table table-bordered">
            <thead>
                <tr class="table-primary">
                    <th class="text-center">ลำดับ</th>
                    <th class="text-center">กิจกรรม</th>
                    <th class="text-center">ปีการศึกษา</th>
                    <th class="text-center">จำนวนชั่วโมง</th>
                    <th class="text-center">วัน</th>
                    <th class="text-center">เวลา</th>
                    <th class="text-center">รับ</th>
                    <th class="text-center">จอง</th>
                    <th class="text-center">เข้าร่วม</th>
                    <th class="text-center">อาจารย์</th>
                    <th class="text-center">เบอร์โทร</th>
                    <th class="text-center">รายละเอียด</th>
                    <th class="text-center">จัดการ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //เรียกไฟล์เชื่อมต่อฐานข้อมูล
                //คิวรี่ข้อมูลมาแสดงในตาราง
                $result = $conn->query("SELECT* FROM tbl_activity WHERE act_delete IS NULL  ORDER BY `act_day` DESC ", PDO::FETCH_OBJ)->fetchAll(PDO::FETCH_OBJ);
                foreach ($result as $key => $row) :
                    $tbl_tch = $conn->query("SELECT * FROM `tbl_tch` WHERE  tch_id='$row->tch_id'", PDO::FETCH_OBJ)->fetch(PDO::FETCH_OBJ);
                    $tbl_bookingdata = $conn->query("SELECT * FROM `tbl_bookingdata` WHERE  act_id='$row->act_id'", PDO::FETCH_OBJ)->fetchAll(PDO::FETCH_OBJ);
                    $tbl_registrationdata = $conn->query("SELECT * FROM `tbl_registrationdata` WHERE  act_id='$row->act_id'", PDO::FETCH_OBJ)->fetchAll(PDO::FETCH_OBJ);
                ?>
                    <tr>
                        <td class="text-center"><?= $key + 1; ?></td>
                        <td class="text-center"><?= $row->act_name; ?></td>
                        <td class="text-center"><?= $row->act_year; ?></td>
                        <td class="text-center"><?= $row->act_hour; ?></td>
                        <td class="text-center"><?= date("d-m-Y", strtotime($row->act_day)); ?></td>
                        <td class="text-center"><?= $row->act_time; ?></td>
                        <td class="text-center"><?= $row->act_number; ?></td>
                        <td class="text-center"><?= count($tbl_bookingdata) ?></td>
                        <td class="text-center"><?= count($tbl_registrationdata) ?></td>
                        <td class="text-center"><?= $tbl_tch->thc_fname . " " . $tbl_tch->thc_lname;; ?></td>
                        <td class="text-center"><?= $row->act_phone; ?></td>
                        <td class="text-center"><?= $row->act_details; ?></td>
                        <td class="text-center">
                            <a href="./MgactivityDetail.php?act_id=<?= $row->act_id; ?>" class="btn btn-info btn-sm">จอง</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </main><!-- End #main -->


    <?php require_once("./footer.php") ?>

</body>

</html>