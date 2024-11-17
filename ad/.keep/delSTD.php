<?php include('header.php'); ?>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
 <title>ระบบจัดการข้อมูลนักศึกษา</title>
 <!-- sweet alert  -->
 <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
</head>

<?php
// ตรวจสอบว่ามีการส่งค่า std_id มาหรือไม่
if (isset($_GET['std_id'])) {
    $std_id = $_GET['std_id']; // รับค่า std_id จาก URL
    require_once 'connect.php'; // เชื่อมต่อฐานข้อมูล

    try {
        // เตรียมคำสั่ง SQL สำหรับลบข้อมูลโดยใช้ std_id
        $stmt = $conn->prepare("DELETE FROM tbl_std WHERE std_id = :std_id");
        $stmt->bindParam(':std_id', $std_id, PDO::PARAM_INT);

        // ดำเนินการลบข้อมูล
        if ($stmt->execute()) {
            echo '<script>
                setTimeout(function() {
                    swal({
                        title: "ลบข้อมูลสำเร็จ",
                        type: "success"
                    }, function() {
                        window.location = "formAddSTD.php"; // เปลี่ยนไปหน้าที่ต้องการหลังลบ
                    });
                }, 1000);
            </script>';
        } else {
            echo '<script>
                setTimeout(function() {
                    swal({
                        title: "ลบข้อมูลไม่สำเร็จ",
                        type: "error"
                    }, function() {
                        window.location = "formAddSTD.php"; // กลับไปหน้าหลัก
                    });
                }, 1000);
            </script>';
        }
    } catch (PDOException $e) {
        echo '<script>
            setTimeout(function() {
                swal({
                    title: "เกิดข้อผิดพลาด",
                    text: "' . $e->getMessage() . '",
                    type: "error"
                }, function() {
                    window.location = "formAddSTD.php"; // กลับไปหน้าหลัก
                });
            }, 1000);
        </script>';
    }
}
?>
