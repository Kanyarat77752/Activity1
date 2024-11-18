<footer>

    <!-- Vendor JS Files -->
    <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-2.1.8/datatables.min.js"></script>
    <script src="./../assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="./../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./../assets/vendor/chart.js/chart.umd.js"></script>
    <script src="./../assets/vendor/echarts/echarts.min.js"></script>
    <script src="./../assets/vendor/quill/quill.js"></script>
    <script src="./../assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="./../assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="./../assets/vendor/php-email-form/validate.js"></script>

    <script>
        $.extend(true, $.fn.dataTable.defaults, {
            "language": {
                "sProcessing": "กำลังดำเนินการ...",
                "sLengthMenu": "แสดง_MENU_ แถว",
                "sZeroRecords": "ไม่พบข้อมูล",
                "sInfo": "แสดง _START_ ถึง _END_ จาก _TOTAL_ แถว",
                "sInfoEmpty": "แสดง 0 ถึง 0 จาก 0 แถว",
                "sInfoFiltered": "(กรองข้อมูล _MAX_ ทุกแถว)",
                "sInfoPostFix": "",
                "sSearch": "ค้นหา:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "เริ่มต้น",
                    "sPrevious": "ก่อนหน้า",
                    "sNext": "ถัดไป",
                    "sLast": "สุดท้าย"
                }
            }
        });

        // เรียกใช้งาน Datatable function

        $('.table').DataTable();
    </script>

    <script src="./../assets/js/main.js?v=<?= time(); ?>"></script>



</footer>