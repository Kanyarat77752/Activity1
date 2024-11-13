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
          <h3> ฟอร์มเพิ่มข้อมูลกิจกรรม </h3>
          <form  method="post">
            <div class="row mb-3">
      
           
              <div class="col">
                ชื่อกิจกรรม
                <input type="text" name="act_name" class="form-control" placeholder="ชื่อกิจกรรม" required minlength="5" maxlength="20">
              </div>
              <div class="col">
                ปีการศึกษา
                <input type="text" name="act_year" class="form-control" placeholder="ปีการศึกษา" required minlength="5" maxlength="20">
              </div>
         
            </div>
            <div class="row mb-3">
              
              <div class="col col-sm-2">
                จำนวนชั่วโมง
                <input type="text" name="act_hour" class="form-control" placeholder=" จำนวนชั่วโมง" required minlength="5" maxlength="20">
              </div>
              <div class="col col-sm-2">
                จำนวนนักศึกษา
                <input type="text" name="act_number" class="form-control" placeholder="จำนวนนักศึกษา" required >
              </div>
              
              <div class="col col-sm-2">
                วัน
                <input type="date" name="act_day" class="form-control" placeholder="วัน" required>
              </div>
        

              <div class="col col-sm-2">
              เวลา
                <select name="act_time" class="form-control" required>
                  <option value="">-เวลา-</option>
                  <option value="เวลา">08.00-12.00</option>
                  <option value="เวลา">13.00-16.00</option>
                  <option value="เวลา">08.00-16.00</option>
                </select>
              </div>

              <div class="col col-sm-4">
              สถานะการจัดกิจกรรม
              <select name="act_status" class="form-control" required>
                <option value="">-สถานะการจัดกิจกรรม-</option>
                      <option value="0">ยกเลิกกิจกรรม</option>
                      <option value="1" selected>กิจกรรมอยู่ระหว่างดำเนินการ</option>
                      <option value="2">กิจกรรมได้จัดขึ้นเเล้ว</option>
                      <option value="3">สร้าง Token เเล้ว</option>
                  
                    </select>

              </div>
            </div>
              
              <div class="row mb-3">
              <div class="col col-sm-6">
              ชื่ออาจารย์ผู้จัดกิจกรรม
                <select name="act_lecturer" class="form-control" required>
                <option value="0">-กรุณาเลือกอาจารย์ผู้จัดกิจกรรม-</option>
                  <option value="1">ผู้ช่วยศาสตราจารย์ ดร.ชรินทร์ญา หวังวัชรกุล</option>
                  <option value="2">ผู้ช่วยศาสตราจารย์ณิชนันทน์ กะวิวังสกุล</option>
                  <option value="3">อาจารย์ภัทรณัฐสุดา จารุธีรพันธุ์</option>
                  <option value="4">อาจารย์ชวลิต ยศสุนทร</option>
                  <option value="5">อาจารย์ปฐมาวดี คำทอง</option>
                  <option value="6">อาจารย์วรกร พิมพาคุณ</option>
                  <option value="7">อาจารย์ไหมคำ ตันติปทุม</option>
                </select>
              </div>
          
              <div class="col">
                เบอร์โทรติดต่อ
                <input type="text" name="act_phone" class="form-control" placeholder="เบอร์โทรติดต่อ" required>
              </div>
            </div>

              <div class="col">
                รายละเอียดการจัดกิจกรรม
                <textarea name="act_details" class="form-control" placeholder="รายละเอียดการจัดกิจกรรม" required rows="4" style="width: 100%;"></textarea>
              </div>

            </div>

            <div class="d-grid gap-4 col-12 mx-auto">
              <button class="btn btn-primary" type="submit">บันทึก</button>
            </div>

          </form>
          <?php } ?>
          <br> 
          <h5>ข้อมูลกิจกรรม
          <a href="formAddACT.php?act=add" class="btn btn-success btn-sm">+เพิ่มข้อมูล</a> </h5>
          <div class="table-responsive">
           <table class="table table-striped  table-hover table-responsive table-bordered">
            <thead>
              <tr class="table-danger">
                <th width="3%">รหัสกิจกรรม</th>
                <th width="20%">ชื่อกิจกรรม</th>
                <th width="5%">ปีการศึกษา</th>
                <th width="2%">จำนวนชั่วโมง</th>
                <th width="7%">วัน</th>
                <th width="7%">เวลา</th>
                <th width="2%">จำนวนนักศึกษา</th>
                <th width="12%">สถานะการจัดกิจกรรม</th>
                <th width="15%">ชื่ออาจารย์ผู้จัดกิจกรรม</th>
                <th width="10%">เบอร์โทรติดต่อ</th>
                <th width="30%">รายละเอียดการจัดกิจกรรม</th>
                <th width="15%">จัดการ</th>
              </tr>
            </thead>
            <tbody>
              <?php
            
              //เรียกไฟล์เชื่อมต่อฐานข้อมูล
              require_once 'connect.php';
              //คิวรี่ข้อมูลมาแสดงในตาราง
              $stmt = $conn->prepare("SELECT* FROM tbl_activity ORDER BY act_id DESC");
              $stmt->execute();
              $result = $stmt->fetchAll();
              foreach($result as $row) {
              ?>
              <tr>
                <td><?= $row['act_id'];?></td>
                <td><?= $row['act_name'];?></td>
                <td><?= $row['act_year'];?></td>
                <td><?= $row['act_hour'];?></td>
                <td><?= $row['act_day'];?></td>
                <td><?= $row['act_time'];?></td>
                <td><?= $row['act_number'];?></td>
                <td>
                  
                <?php
                if ($row['act_status']==0){
                  echo "ยกเลิกการจัดกิจกรรม";
                }elseif($row['act_status']==1){
                  echo "กิจกรรมได้จัดขึ้นแล้ว";
                }elseif($row['act_status']==2){
                  echo "อยู่ระหว่างการจัดกิจกรรม";
                }elseif($row['act_status']==3){
                  echo "สร้าง Token แล้ว";
                }
                ?>
              
              </td>
              <td>
                <?php
                if ($row['act_lecturer']==0){
                  echo "กรุณาเลือกอาจารย์ผู้จัดกิจกรรม";
                }elseif($row['act_lecturer']==1){
                  echo "ผู้ช่วยศาสตราจารย์ ดร.ชรินทร์ญา หวังวัชรกุล";
                }elseif($row['act_lecturer']==2){
                  echo "ผู้ช่วยศาสตราจารย์ณิชนันทน์ กะวิวังสกุล";
                }elseif($row['act_lecturer']==3){
                  echo "อาจารย์ภัทรณัฐสุดา จารุธีรพันธุ์";
                }elseif($row['act_lecturer']==4){
                  echo "อาจารย์ชวลิต ยศสุนทร";
                }elseif($row['act_lecturer']==5){
                  echo "อาจารย์ปฐมาวดี คำทอง";
                }elseif($row['act_lecturer']==6){
                  echo "อาจารย์วรกร พิมพาคุณ";
                }elseif($row['act_lecturer']==7){
                  echo "อาจารย์ไหมคำ ตันติปทุม";
                }
                ?>
              </td>
                <td><?= $row['act_phone'];?></td>
                <td><?= $row['act_details'];?></td>
                <td>

          <div class="d-flex">
                  <!-- ปุ่มแก้ไข -->
              <a href="formEditACT.php?act=edit&act_id=<?= $row['act_id']; ?>" class="btn btn-warning btn-sm me-2">แก้ไข</a>
                  <!-- ปุ่มลบ -->
              <a href="delACT.php?act=delete&act_id=<?= $row['act_id']; ?>" class="btn btn-danger btn-sm">ลบ</a> 
          </div>
              </td>
              
                <?php } ?>
               </tr>
              </tbody>
            </table>
            </div>
            <br>
         
          </div>
        </div>
      </div>
    </body>
  </html>
  <?php
    //echo '<pre>';
    //print_r($_POST);
    //echo '</pre>';
    //exit();
  //ตรวจสอบตัวแปรที่ส่งมาจากฟอร์ม
  
  if ( isset($_POST['act_name']) && isset($_POST['act_year'])) {
  //ไฟล์เชื่อมต่อฐานข้อมูล
    require_once 'connect.php';
  //sql insert

  
  $stmt = $conn->prepare("INSERT INTO tbl_activity
  (
 
  act_name, 
  act_year, 
  act_hour,
  act_day,
  act_time,
  act_number,
  act_status,
  act_lecturer,
  act_phone,
  act_details

  )
  VALUES
  (
 
  :act_name, 
  :act_year, 
  :act_hour,
  :act_day,
  :act_time,
  :act_number,
  :act_status,
  :act_lecturer,
  :act_phone,
  :act_details
  
  )");
  //bindParam data type

$stmt->bindParam(':act_name', $_POST['act_name'], PDO::PARAM_STR);
$stmt->bindParam(':act_year', $_POST['act_year'], PDO::PARAM_STR);
$stmt->bindParam(':act_hour', $_POST['act_hour'], PDO::PARAM_INT);
$stmt->bindParam(':act_day', $_POST['act_day'], PDO::PARAM_STR);
$stmt->bindParam(':act_time', $_POST['act_time'], PDO::PARAM_STR);
$stmt->bindParam(':act_number', $_POST['act_number'], PDO::PARAM_INT);
$stmt->bindParam(':act_status', $_POST['act_status'], PDO::PARAM_STR);
$stmt->bindParam(':act_lecturer', $_POST['act_lecturer'], PDO::PARAM_STR);
$stmt->bindParam(':act_phone', $_POST['act_phone'], PDO::PARAM_STR);
$stmt->bindParam(':act_details', $_POST['act_details'], PDO::PARAM_STR);

//$result = $stmt->execute(); 
try {
  $result = $stmt->execute();
} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
}

$conn = null; //close connect db
//เงื่อนไขตรวจสอบการเพิ่มข้อมูล

if ($result) {
    echo '<script>
       setTimeout(function() {
      swal({
      title: "เพิ่มข้อมูลสำเร็จ",
      type: "success"
      }, function() {
      window.location = "formAddACT.php"; //หน้าที่ต้องการให้กระโดดไป
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
      window.location = "formAddACT.php"; //หน้าที่ต้องการให้กระโดดไป
      });
    }, 1000);
  </script>';
  } //else ของ if result
   
  } 

  ?>