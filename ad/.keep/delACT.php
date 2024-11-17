<head>
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
// ตรวจสอบว่า GET request มี act และ act_id หรือไม่
if (isset($_GET['act']) && $_GET['act'] == 'delete' && isset($_GET['act_id'])) {
    $act_id = $_GET['act_id']; // รับรหัสนักศึกษาจาก URL
    require_once 'connect.php'; // เชื่อมต่อกับฐานข้อมูล

    try {
        // เตรียมคำสั่ง SQL สำหรับการลบข้อมูล
        $stmt = $conn->prepare("DELETE FROM tbl_activity WHERE act_id = :act_id");
        $stmt->bindParam(':act_id', $act_id, PDO::PARAM_INT);

        // ดำเนินการลบข้อมูล
        $result = $stmt->execute();

        // ตรวจสอบผลการลบข้อมูล
        if ($result) {
            echo '<script>
                setTimeout(function() {
                    swal({
                        title: "ลบข้อมูลนักศึกษาสำเร็จ",
                        type: "success"
                    }, function() {
                        window.location = "formAddACT.php"; // กำหนดหน้าไปหลังจากลบ
                    });
                }, 1000);
            </script>';
        } else {
            echo '<script>
                setTimeout(function() {
                    swal({
                        title: "ไม่พบข้อมูลที่ต้องการลบ",
                        text: "",
                        type: "warning"
                    }).then(function() {
                        window.location = "formAddACT.php"; // กำหนดหน้าไปหากไม่มีข้อมูล
                    });
                }, 1000);
            </script>';
        }
        exit();
    } catch (PDOException $e) {
        echo '<script>
            setTimeout(function() {
                swal({
                    title: "เกิดข้อผิดพลาด",
                    text: "' . $e->getMessage() . '",
                    type: "error"
                }).then(function() {
                    window.location.href = "formAddSTD.php"; // กำหนดหน้าไปหากเกิดข้อผิดพลาด
                });
            }, 1000);
        </script>';
        exit();
    }
}
?>
