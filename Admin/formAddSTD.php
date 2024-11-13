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
    <div class="container">
      <div class="row">
        <div class="col-md-12">
         
          <?php
          //ถ้ามีการส่งพารามิเตอร์ method get และ  method get ชือ act = add จะแสดงฟอร์มเพิ่มข้อมูล
          if(isset($_GET['act']) && $_GET['act']=='add'){ ?>
          <h3> ฟอร์มเพิ่มข้อมูลนักศึกษา </h3>
          <form  method="post">
            
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
            <div class="d-grid gap-2 col-12 mx-auto">
              <button class="btn btn-primary" type="submit">บันทึก</button>
            </div>
          </form>
          <?php } ?>
          <br> 
          <h5>ข้อมูลนักศึกษา
          <a href="formAddSTD.php?act=add" class="btn btn-success btn-sm">+เพิ่มข้อมูล</a> </h5>
          <div class="table-responsive">
           <table class="table table-striped  table-hover table-responsive table-bordered">
            <thead>
              <tr class="table-danger">
                <th width="15%">รหัสนักศึกษา</th>
                <th width="20%">ชื่อ-สกุล</th>
                <th width="15%">หมู่เรียน</th>
                <th width="10%">โปรแกรม</th>
                <th width="10%">เบอร์โทร</th>
                <th width="20%">อีเมล</th>
                <th width="10%">จัดการ</th>
              </tr>
            </thead>
            <tbody>
              <?php
              //เรียกไฟล์เชื่อมต่อฐานข้อมูล
              require_once 'connect.php';
              //คิวรี่ข้อมูลมาแสดงในตาราง
              $stmt = $conn->prepare("SELECT* FROM tbl_std ORDER BY std_code DESC");
              $stmt->execute();
              $result = $stmt->fetchAll();
              foreach($result as $row) {
              ?>
              <tr>
                <td><?= $row['std_code'];?></td>
                <td><?= $row['std_prefix'].$row['std_name'].' '.$row['std_lastname'];?></td>
                <td><?= $row['std_group'];?></td>
                <td><?= $row['std_program'];?></td>
                <td><?= $row['std_phone'];?></td>
                <td><?= $row['std_email'];?></td>
                <td>
                  <!-- ปุ่มแก้ไข -->
                  <a href="formEditACT.php?std_code=<?= $row['std_code']; ?>" class="btn btn-warning btn-sm">แก้ไข</a>
                  <!-- ปุ่มลบ -->
                  <a href="delSTD.php?std_code=<?= $row['std_code']; ?>" class="btn btn-danger btn-sm" >ลบ</a>
                </td>

                <?php } ?>
               </tr>
              </tbody>
            </table>
            </div>
            <br>
            <center>ระบบจัดการข้อมูลกิจกรรมนักศึกษาสาขาวิชาคอมพิวเตอร์ธุรกิจดิจิทัล</center>
          </div>
        </div>
      </div>
    </body>
  </html>
  <?php
   //  echo '<pre>';
    //     print_r($_POST);
   // echo '</pre>';
  // exit();
  //ตรวจสอบตัวแปรที่ส่งมาจากฟอร์ม
  if (isset($_POST['std_code']) && isset($_POST['std_name'])) {
 
    //ไฟล์เชื่อมต่อฐานข้อมูล
    require_once 'connect.php';
  //sql insert
  $stmt = $conn->prepare("INSERT INTO tbl_std
  (
  std_code,
  std_group,
  std_program, 
  std_prefix, 
  std_name, 
  std_lastname,
  std_phone,
  std_email
  )
  VALUES
  (
  :std_code,
  :std_group,
  :std_program, 
  :std_prefix, 
  :std_name, 
  :std_lastname,
  :std_phone,
  :std_email
  )
  ");
  //bindParam data type
  $stmt->bindParam(':std_group', $_POST['std_group'], PDO::PARAM_STR);
  $stmt->bindParam(':std_code', $_POST['std_code'], PDO::PARAM_STR);
  $stmt->bindParam(':std_program', $_POST['std_program'], PDO::PARAM_STR);
  $stmt->bindParam(':std_prefix', $_POST['std_prefix'], PDO::PARAM_STR);
  $stmt->bindParam(':std_name', $_POST['std_name'], PDO::PARAM_STR);
  $stmt->bindParam(':std_lastname', $_POST['std_lastname'], PDO::PARAM_STR);
  $stmt->bindParam(':std_phone', $_POST['std_phone'], PDO::PARAM_STR);
  $stmt->bindParam(':std_email', $_POST['std_email'], PDO::PARAM_STR);

//$result = $stmt->execute(); 
try {
  $result = $stmt->execute();
} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
}


  $conn = null; //close connect db
  //เงื่อนไขตรวจสอบการเพิ่มข้อมูล
  
  if($result){
    echo '<script>
      setTimeout(function() {
        swal({
        title: "เพิ่มข้อมูลสำเร็จ",
        type: "success"
        }, function() {
        window.location = "formAddSTD.php"; //หน้าที่ต้องการให้กระโดดไป
        });
      }, 1000);
    </script>';
    }else{
    echo '<script>
      setTimeout(function() {
        swal({
        title: "เกิดข้อผิดพลาด",
        type: "error"
        }, function() {
        window.location = "formAddSTD.php"; //หน้าที่ต้องการให้กระโดดไป
        });
      }, 1000);
    </script>';
    } //else ของ if result
  } 

  ?>