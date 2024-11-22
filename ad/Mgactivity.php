<!DOCTYPE html>
<html lang="en">
<?php require_once("./head.php") ?>

<body>
    <?php require_once("./header.php") ?>
    <!-- End Sidebar-->
    <main id="main" class="main">
        <!-- ที่เขียนโค้ด -->
        <div class="row">
            <div class="col-12">
                <h3 class="h3-header">
                    ข้อมูลกิจกรรม
                </h3>
            </div>
            <div class="col-12 d-flex justify-content-between mb-3">
                <div></div>
                <a href="#" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modal_add_activity"> + เพิ่มข้อมูล</a>
            </div>
            <div class="col-12">
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
                        $result = $conn->query("SELECT* FROM tbl_activity WHERE act_delete IS NULL  ", PDO::FETCH_OBJ)->fetchAll(PDO::FETCH_OBJ);
                        foreach ($result as $key => $row) :
                            $tbl_tch = $conn->query("SELECT * FROM `tbl_tch` WHERE  tch_id='$row->tch_id'", PDO::FETCH_OBJ)->fetch(PDO::FETCH_OBJ);
                            
                        ?>

                            <tr>
                                <td class="text-center"><?= $key + 1; ?></td>
                                <td class="text-center"><?= $row->act_name; ?></td>
                                <td class="text-center"><?= $row->act_year; ?></td>
                                <td class="text-center"><?= $row->act_hour; ?></td>
                                <td class="text-center"><?= date("d-m-Y", strtotime($row->act_day)); ?></td>
                                <td class="text-center"><?= $row->act_time; ?></td>
                                <td class="text-center"><?= $row->act_number; ?></td>
                                <td class="text-center"></td>
                                <td class="text-center"></td>
                                <td class="text-center"><?= $tbl_tch->thc_fname . " " . $tbl_tch->thc_lname; ?></td>
                                <td class="text-center"><?= $row->act_phone; ?></td>
                                <td class="text-center"><?= $row->act_details; ?></td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-warning btn-sm me-2 " data-bs-toggle="modal" data-bs-target="#modal_edit_activity-<?= $row->act_id; ?>">แก้ไข</a>
                                    <a href="./MgactivityDetail.php?act_id=<?= $row->act_id; ?>" class="btn btn-info btn-sm">เพิ่มเติม</a>
                                </td>
                            </tr>

                            <div class="modal fade" id="modal_edit_activity-<?= $row->act_id; ?>" tabindex="-1" aria-labelledby="modal_edit_activity-<?= $row->act_id; ?>Label" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <form action="./action_form/edit__activity_action.php?act_id=<?= $row->act_id; ?>" method="post">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modal_edit_activity-<?= $row->act_id; ?>Label">ฟอร์มแก้ไขข้อมูลกิจกรรม</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">

                                                <div class="row mb-3">
                                                    <div class="col">
                                                        ชื่อกิจกรรม
                                                        <input type="text" value="<?= $row->act_name; ?>" name="act_name" class="form-control" placeholder="ชื่อกิจกรรม" required minlength="5" maxlength="20">
                                                    </div>
                                                    <div class="col">
                                                        ปีการศึกษา
                                                        <input type="text" value="<?= $row->act_year; ?>" name="act_year" class="form-control" placeholder="ปีการศึกษา" required minlength="4" maxlength="20">
                                                    </div>

                                                </div>
                                                <div class="row mb-3">

                                                    <div class="col col-sm-3">
                                                        <label for="">จำนวนชั่วโมง</label>
                                                        <input type="number" value="<?= $row->act_hour ?>" name="act_hour" class="form-control" placeholder="จำนวนชั่วโมง" required min="0" step="0.1">
                                                    </div>
                                                    <div class="col col-sm-3">
                                                        <label for="">จำนวนนักศึกษา</label>
                                                        <input type="number" value="<?= $row->act_number ?>" name="act_number" class="form-control" placeholder="จำนวนนักศึกษา" required min="0" step="1">
                                                    </div>

                                                    <div class="col col-sm-3">
                                                        <label for="วัน">วัน</label>
                                                        <input type="date" value="<?= date("Y-m-d", strtotime($row->act_day)); ?>" name="act_day" class="form-control" placeholder="วัน" required>
                                                    </div>

                                                    <div class="col col-sm-3">
                                                        <label for="">เวลา</label>
                                                        <select name="act_time" class="form-control" required>
                                                            <option <?= $row->act_time == ""  ? "selected" : "" ?> value="">-เวลา-</option>
                                                            <option <?= $row->act_time == "08.00-12.00"  ? "selected" : "" ?> value="08.00-12.00">08.00-12.00</option>
                                                            <option <?= $row->act_time == "13.00-16.00"  ? "selected" : "" ?> value="13.00-16.00">13.00-16.00</option>
                                                            <option <?= $row->act_time == "08.00-16.00"  ? "selected" : "" ?> value="08.00-16.00">08.00-16.00</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col col-sm-6">
                                                        ชื่ออาจารย์ผู้จัดกิจกรรม
                                                        <select name="tch_id" class="form-control" required>
                                                            <option value="" selected>-กรุณาเลือกอาจารย์ผู้จัดกิจกรรม-</option>
                                                            <?php $items_tch = $conn->query("SELECT * FROM `tbl_tch` WHERE thc_delete IS NULL ", PDO::FETCH_OBJ)->fetchAll(PDO::FETCH_OBJ); ?>
                                                            <?php foreach ($items_tch as $item) : ?>
                                                                <option <?= $row->tch_id == $item->tch_id  ? "selected" : "" ?> value="<?= $item->tch_id; ?>"><?= $item->thc_fname . " " . $item->thc_lname; ?></option>
                    
                                                                <?php endforeach ?>
                                                        </select>
                                                    </div>
                                                    <div class="col col-sm-12">
                                                        รายละเอียดกิจกรรม
                                                        <textarea name="act_details" id="act_details" class="form-control" placeholder="รายละเอียดกิจกรรม" required><?= $row->act_details; ?></textarea>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                                <a href="./action_form/delete__activity_action.php?act_id=<?= $row->act_id; ?>" class="btn btn-danger">ลบ</a>
                                                <button type="submit" class="btn btn-primary">บันทึกการแก้ไข</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main><!-- End #main -->

    <div class="modal fade" id="modal_add_activity" tabindex="-1" aria-labelledby="modal_add_activityLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <form action="./action_form/add__activity_action.php" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal_add_activityLabel">ฟอร์มเพิ่มข้อมูลกิจกรรม</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col">
                                ชื่อกิจกรรม
                                <input type="text" name="act_name" class="form-control" placeholder="ชื่อกิจกรรม" required minlength="5" maxlength="20">
                            </div>
                            <div class="col">
                                ปีการศึกษา
                                <input type="text" name="act_year" class="form-control" placeholder="ปีการศึกษา" required minlength="4" maxlength="20">
                            </div>

                        </div>
                        <div class="row mb-3">

                            <div class="col col-sm-3">
                                <label for="">จำนวนชั่วโมง</label>
                                <input type="number" name="act_hour" class="form-control" placeholder="จำนวนชั่วโมง" required min="0" step="0.1">
                            </div>
                            <div class="col col-sm-3">
                                <label for="">จำนวนนักศึกษา</label>
                                <input type="number" name="act_number" class="form-control" placeholder="จำนวนนักศึกษา" required min="0" step="1">
                            </div>

                            <div class="col col-sm-3">
                                <label for="วัน">วัน</label>
                                <input type="date" name="act_day" class="form-control" placeholder="วัน" required>
                            </div>

                            <div class="col col-sm-3">
                                <label for="">เวลา</label>
                                <select name="act_time" class="form-control" required>
                                    <option value="" selected>-เวลา-</option>
                                    <option value="08.00-12.00">08.00-12.00</option>
                                    <option value="13.00-16.00">13.00-16.00</option>
                                    <option value="08.00-16.00">08.00-16.00</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col col-sm-6">
                                ชื่ออาจารย์ผู้จัดกิจกรรม
                                <select name="tch_id" class="form-control" required>
                                    <option value="" selected>-กรุณาเลือกอาจารย์ผู้จัดกิจกรรม-</option>
                                    <?php $items_tch = $conn->query("SELECT * FROM `tbl_tch` WHERE thc_delete IS NULL ", PDO::FETCH_OBJ)->fetchAll(PDO::FETCH_OBJ); ?>
                                    <?php foreach ($items_tch as $item) : ?>
                                        <option value="<?= $item->tch_id; ?>"><?= $item->thc_fname . " " . $item->thc_lname; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col col-sm-12">
                                รายละเอียดกิจกรรม
                                <textarea name="act_details" id="act_details" class="form-control" placeholder="รายละเอียดกิจกรรม" required></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                        <button type="submit" class="btn btn-primary">เพิ่มข้อมูล</button>
                    </div>
                </form>

            </div>
        </div>
    </div>



    <?php require_once("./footer.php") ?>

</body>

</html>