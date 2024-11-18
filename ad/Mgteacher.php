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
                    ข้อมูลอาจารย์
                </h3>
            </div>
            <div class="col-12 d-flex justify-content-between mb-3">
                <div></div>
                <a href="#" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modal_add_teacher"> + เพิ่มข้อมูล</a>
            </div>
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr class="table-primary">
                            <th class="text-center">ลำดับ</th>
                            <th class="text-center">ชื่อ</th>
                            <th class="text-center">สกุล</th>
                            <th class="text-center">เบอร์โทร</th>
                            <th class="text-center">อีเมล</th>
                            <th class="text-center">จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //เรียกไฟล์เชื่อมต่อฐานข้อมูล
                        //คิวรี่ข้อมูลมาแสดงในตาราง
                        $result = $conn->query("SELECT* FROM tbl_tch WHERE thc_delete IS NULL  ORDER BY `thc_fname` ASC ", PDO::FETCH_OBJ)->fetchAll(PDO::FETCH_OBJ);
                        foreach ($result as $key => $row) :
                        ?>
                            <tr>
                                <td class="text-center"><?= $key + 1; ?></td>
                                <td class="text-center"><?= $row->thc_fname; ?></td>
                                <td class="text-center"><?= $row->thc_lname; ?></td>
                                <td class="text-center"><?= $row->thc_phone ?></td>
                                <td class="text-center"><?= $row->tch_mail; ?></td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-warning btn-sm me-2 " data-bs-toggle="modal" data-bs-target="#modal_edit_teacher-<?= $row->tch_id; ?>">แก้ไข</a>
                                    <!-- <a href="./MgteacherDetail.php?tch_id=<?= $row->tch_id; ?>" class="btn btn-info btn-sm">เพิ่มเติม</a> -->
                                </td>
                            </tr>
                            <div class="modal fade" id="modal_edit_teacher-<?= $row->tch_id; ?>" tabindex="-1" aria-labelledby="modal_edit_teacher-<?= $row->tch_id; ?>Label" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <form action="./action_form/edit__teacher_action.php?tch_id=<?= $row->tch_id; ?>" method="post">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modal_edit_teacher-<?= $row->tch_id; ?>Label">ฟอร์มแก้ไขข้อมูลกิจกรรม</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row mb-3">
                                            
                                                    <div class="col col-sm-4">
                                                        ชื่อ
                                                        <input type="text" value="<?= $row->thc_fname; ?>" name="thc_fname" class="form-control" placeholder="ชื่อ" required>
                                                    </div>
                                                    <div class="col col-sm-6">
                                                        นามสกุล
                                                        <input type="text" value="<?= $row->thc_lname; ?>" name="thc_lname" class="form-control" placeholder="นามสกุล" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col">
                                                        เบอร์โทร
                                                        <input type="tel" value="<?= $row->thc_phone; ?>" name="thc_phone" class="form-control" placeholder="เบอร์โทร" required minlength="10" maxlength="10">
                                                    </div>
                                                    <div class="col">
                                                        อีเมล
                                                        <input type="email" value="<?= $row->tch_mail; ?>" name="tch_mail" class="form-control" placeholder="อีเมล" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col">
                                                        รหัสผ่าน
                                                        <input type="password" value="<?= $row->tch_pass; ?>" name="tch_pass" class="form-control" placeholder="รหัสผ่าน" required minlength="1">
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                                <a href="./action_form/delete__teacher_action.php?tch_id=<?= $row->tch_id; ?>" class="btn btn-danger">ลบ</a>
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

    <div class="modal fade" id="modal_add_teacher" tabindex="-1" aria-labelledby="modal_add_teacherLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <form action="./action_form/add__teacher_action.php" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal_add_teacherLabel">ฟอร์มเพิ่มข้อมูลอาจารย์</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="row mb-3">

                            <div class="col col-sm-4">
                                ชื่อ
                                <input type="text" name="thc_fname" class="form-control" placeholder="ชื่อ" required>
                            </div>
                            <div class="col col-sm-6">
                                นามสกุล
                                <input type="text" name="thc_lname" class="form-control" placeholder="นามสกุล" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                เบอร์โทร
                                <input type="tel" name="thc_phone" class="form-control" placeholder="เบอร์โทร" required minlength="10" maxlength="10">
                            </div>
                            <div class="col">
                                อีเมล
                                <input type="email" name="tch_mail" class="form-control" placeholder="อีเมล" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                รหัสผ่าน
                                <input type="password" name="tch_pass" class="form-control" placeholder="รหัสผ่าน" required minlength="1">
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