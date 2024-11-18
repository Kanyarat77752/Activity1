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
                    ข้อมูลนักศึกษา
                </h3>
            </div>
            <div class="col-12 d-flex justify-content-between mb-3">
                <div></div>
                <a href="#" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modal_add_student"> + เพิ่มข้อมูล</a>
            </div>
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr class="table-primary">
                            <th class="text-center">ลำดับ</th>
                            <th class="text-center">รหัสนักศึกษา</th>
                            <th class="text-center">ชื่อ</th>
                            <th class="text-center">สกุล</th>
                            <th class="text-center">หมู่เรียน</th>
                            <th class="text-center">โปรแกรม</th>
                            <th class="text-center">เบอร์โทร</th>
                            <th class="text-center">อีเมล</th>
                            <th class="text-center">จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //เรียกไฟล์เชื่อมต่อฐานข้อมูล
                        //คิวรี่ข้อมูลมาแสดงในตาราง
                        $result = $conn->query("SELECT* FROM tbl_std WHERE std_delete IS NULL  ORDER BY `std_code` ASC ", PDO::FETCH_OBJ)->fetchAll(PDO::FETCH_OBJ);
                        foreach ($result as $key => $row) :
                        ?>
                            <tr>
                                <td class="text-center"><?= $key + 1; ?></td>
                                <td class="text-center"><?= $row->std_code; ?></td>
                                <td class="text-center"><?= $row->std_prefix . " " . $row->std_name; ?></td>
                                <td class="text-center"><?= $row->std_lastname; ?></td>
                                <td class="text-center"><?= $row->std_group ?></td>
                                <td class="text-center"><?= $row->std_program; ?></td>
                                <td class="text-center"><?= $row->std_phone; ?></td>
                                <td class="text-center"><?= $row->std_email ?></td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-warning btn-sm me-2 " data-bs-toggle="modal" data-bs-target="#modal_edit_student-<?= $row->std_id; ?>">แก้ไข</a>
                                    <a href="./MgstudentDetail.php?std_id=<?= $row->std_id; ?>" class="btn btn-info btn-sm">เพิ่มเติม</a>
                                </td>
                            </tr>

                            <div class="modal fade" id="modal_edit_student-<?= $row->std_id; ?>" tabindex="-1" aria-labelledby="modal_edit_student-<?= $row->std_id; ?>Label" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <form action="./action_form/edit__student_action.php?std_id=<?= $row->std_id; ?>" method="post">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modal_edit_student-<?= $row->std_id; ?>Label">ฟอร์มแก้ไขข้อมูลกิจกรรม</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">

                                                <div class="row mb-3">
                                                    <div class="col col-sm-2">
                                                        เลือกโปรแกรม
                                                        <select name="std_program" class="form-control" required>
                                                            <option <?= $row->std_program == ""  ? "selected" : "" ?> value="">-เลือกโปรแกรม-</option>
                                                            <option <?= $row->std_program == "ภาคปกติ"  ? "selected" : "" ?> value="ภาคปกติ">ภาคปกติ</option>
                                                            <option <?= $row->std_program == "ภาคกศบ."  ? "selected" : "" ?> value="ภาคกศบ.">ภาคกศบ.</option>
                                                        </select>
                                                    </div>

                                                    <div class="col col-sm-5">
                                                        รหัสนักศึกษา
                                                        <input type="text" value="<?= $row->std_code; ?>" name="std_code" class="form-control" placeholder="รหัสนักศึกษา" required minlength="5" maxlength="20">
                                                    </div>
                                                    <div class="col col-sm-5">
                                                        หมู่เรียน
                                                        <input type="text" value="<?= $row->std_group; ?>" name="std_group" class="form-control" placeholder="หมู่เรียน" required minlength="5" maxlength="20">
                                                    </div>

                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col col-sm-2">
                                                        คำนำหน้าชื่อ
                                                        <select name="std_prefix" class="form-control" required>
                                                            <option <?= $row->std_prefix == ""  ? "selected" : "" ?> value="">-คำนำหน้าชื่อ-</option>
                                                            <option <?= $row->std_prefix == "นาย"  ? "selected" : "" ?> value="นาย">นาย</option>
                                                            <option <?= $row->std_prefix == "นางสาว"  ? "selected" : "" ?> value="นางสาว">นางสาว</option>
                                                            <option <?= $row->std_prefix == "นาง"  ? "selected" : "" ?> value="นาง">นาง</option>
                                                        </select>
                                                    </div>
                                                    <div class="col col-sm-4">
                                                        ชื่อ
                                                        <input type="text" value="<?= $row->std_name; ?>" name="std_name" class="form-control" placeholder="ชื่อ" required>
                                                    </div>
                                                    <div class="col col-sm-6">
                                                        นามสกุล
                                                        <input type="text" value="<?= $row->std_lastname; ?>" name="std_lastname" class="form-control" placeholder="นามสกุล" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col">
                                                        เบอร์โทร
                                                        <input type="tel" value="<?= $row->std_phone; ?>" name="std_phone" class="form-control" placeholder="เบอร์โทร" required minlength="10" maxlength="10">
                                                    </div>
                                                    <div class="col">
                                                        อีเมล
                                                        <input type="email" value="<?= $row->std_email; ?>" name="std_email" class="form-control" placeholder="อีเมล" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col">
                                                        รหัสผ่าน
                                                        <input type="password" value="<?= $row->std_pass; ?>" name="std_pass" class="form-control" placeholder="รหัสผ่าน" required minlength="1">
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                                <a href="./action_form/delete__student_action.php?std_id=<?= $row->std_id; ?>" class="btn btn-danger">ลบ</a>
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

    <div class="modal fade" id="modal_add_student" tabindex="-1" aria-labelledby="modal_add_studentLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <form action="./action_form/add__student_action.php" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal_add_studentLabel">ฟอร์มเพิ่มข้อมูลนักศึกษา</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col col-sm-2">
                                เลือกโปรแกรม
                                <select name="std_program" class="form-control" required>
                                    <option value="">-เลือกโปรแกรม-</option>
                                    <option value="ภาคปกติ">ภาคปกติ</option>
                                    <option value="ภาคกศบ.">ภาคกศบ.</option>
                                </select>
                            </div>

                            <div class="col col-sm-5">
                                รหัสนักศึกษา
                                <input type="text" name="std_code" class="form-control" placeholder="รหัสนักศึกษา" required minlength="5" maxlength="20">
                            </div>
                            <div class="col col-sm-5">
                                หมู่เรียน
                                <input type="text" name="std_group" class="form-control" placeholder="หมู่เรียน" required minlength="5" maxlength="20">
                            </div>

                        </div>
                        <div class="row mb-3">
                            <div class="col col-sm-2">
                                คำนำหน้าชื่อ
                                <select name="std_prefix" class="form-control" required>
                                    <option value="">-คำนำหน้าชื่อ-</option>
                                    <option value="นาย">นาย</option>
                                    <option value="นางสาว">นางสาว</option>
                                    <option value="นาง">นาง</option>
                                </select>
                            </div>
                            <div class="col col-sm-4">
                                ชื่อ
                                <input type="text" name="std_name" class="form-control" placeholder="ชื่อ" required>
                            </div>
                            <div class="col col-sm-6">
                                นามสกุล
                                <input type="text" name="std_lastname" class="form-control" placeholder="นามสกุล" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                เบอร์โทร
                                <input type="tel" name="std_phone" class="form-control" placeholder="เบอร์โทร" required minlength="10" maxlength="10">
                            </div>
                            <div class="col">
                                อีเมล
                                <input type="email" name="std_email" class="form-control" placeholder="อีเมล" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                รหัสผ่าน
                                <input type="password" name="std_pass" class="form-control" placeholder="รหัสผ่าน" required minlength="1">
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