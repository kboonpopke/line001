<?php 
session_start();
?>
<?php   
    require 'nav.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Line Notify</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Warehouse:รายการเบิกสินค้า</h1>

        <hr>

        <form action="sendinfo.php" method="post"><?php
                if(isset($_SESSION['success'])){
            ?>
            <div class="alert alert-success" role="alert">
                <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                ?>
            </div>
            <?php } ?>


            <div class="mb-3">
                <label class="form-label">ชื่อผู้ทำรายการ</label>
                <input type="text" class="form-control" name="name" aria-describedby="name">
            </div>
            <div class="mb-3">
                <label class="form-label">แผนก</label>
                <input type="text" class="form-control" name="department" aria-describedby="department">
            </div>
            <div class="mb-3">
                <label class="form-label">รายการเบิก</label>
                <select class="form-select" name="goods" aria-describedby="goods">
                    <option value="">กรุณาเลือก</option>
                    <option value="PM-PRF-000001 พรีฟอร์ม 15.50 กรัม">PM-PRF-000001	พรีฟอร์ม 15.50 กรัม</option>
                    <option value="PM-PRF-000002 พรีฟอร์ม 18.00 กรัม">PM-PRF-000002	พรีฟอร์ม 18.00 กรัม</option>
                    <option value="PM-PRF-000003 พรีฟอร์ม 31.80 กรัม">PM-PRF-000003	พรีฟอร์ม 31.80 กรัม</option>
                    <option value="PM-CAP-000001 ฝา 29/25 XT">PM-CAP-000001	ฝา 29/25 XT</option>
                    <option value="PM-LBF-000001 ฉลากด้านหน้า สำหรับน้ำแร่ ขนาด 350 มิลลิลิตร">PM-LBF-000001	ฉลากด้านหน้า สำหรับน้ำแร่ ขนาด 350 มิลลิลิตร</option>
                    <option value="PM-LBB-000001 ฉลากด้านหลัง สำหรับน้ำแร่ ขนาด 350 มิลลิลิตร">PM-LBB-000001	ฉลากด้านหลัง สำหรับน้ำแร่ ขนาด 350 มิลลิลิตร</option>
                    <option value="PM-LBF-000002 ฉลากด้านหน้า สำหรับน้ำแร่ ขนาด 520 มิลลิลิตร">PM-LBF-000002	ฉลากด้านหน้า สำหรับน้ำแร่ ขนาด 520 มิลลิลิตร</option>
                    <option value="PM-LBB-000002 ฉลากด้านหลัง สำหรับน้ำแร่ ขนาด 520 มิลลิลิตร">PM-LBB-000002	ฉลากด้านหลัง สำหรับน้ำแร่ ขนาด 520 มิลลิลิตร</option>
                    <option value="PM-LBF-000003 ฉลากด้านหน้า สำหรับน้ำแร่ ขนาด 1,250 มิลลิลิตร">PM-LBF-000003	ฉลากด้านหน้า สำหรับน้ำแร่ ขนาด 1,250 มิลลิลิตร</option>
                    <option value="PM-LBB-000003 ฉลากด้านหลัง สำหรับน้ำแร่ ขนาด 1,250  มิลลิลิตร">PM-LBB-000003	ฉลากด้านหลัง สำหรับน้ำแร่ ขนาด 1,250  มิลลิลิตร</option>
                    <option value="PM-SHF-000001 ฟิล์มหดแพ็คสำหรับน้ำแร่ขนาด 350 มล. MT">PM-SHF-000001	ฟิล์มหดแพ็คสำหรับน้ำแร่ขนาด 350 มล. MT</option>
                    <option value="PM-SHF-000002 ฟิล์มหดแพ็คสำหรับน้ำแร่ขนาด 520 มล. AF">PM-SHF-000002	ฟิล์มหดแพ็คสำหรับน้ำแร่ขนาด 520 มล. AF</option>
                    <option value="PM-SHF-000003 ฟิล์มหดแพ็คสำหรับน้ำแร่ขนาด 1250 มล. AF">PM-SHF-000003	ฟิล์มหดแพ็คสำหรับน้ำแร่ขนาด 1250 มล. AF</option>
                    <option value="PM-SHF-000004 ฟิล์มหดแพ็คโปรโมชั่นสำหรับน้ำแร่ขนาด 1250 มล. MT">PM-SHF-000004	ฟิล์มหดแพ็คโปรโมชั่นสำหรับน้ำแร่ขนาด 1250 มล. MT</option>
                    <option value="PM-STF-000001 ฟิล์มพันพาเลท">PM-STF-000001	ฟิล์มพันพาเลท</option>
                    <option value="PM-STF-000002 ฟิล์มพันพาเลท (พันมือ)">PM-STF-000002	ฟิล์มพันพาเลท (พันมือ)</option>
                    <option value="PM-HDT-000001 เทปหูหิ้ว">PM-HDT-000001	เทปหูหิ้ว</option>
                    <option value="PM-PLB-000001 บาร์โค้ดพาเล็ทสติกเกอร์">PM-PLB-000001	บาร์โค้ดพาเล็ทสติกเกอร์</option>
                    <option value="PM-RBB-000001 ริบบอนบาร์โค้ดพาเล็ท">PM-RBB-000001	ริบบอนบาร์โค้ดพาเล็ท</option>
                    <option value="PM-LYP-000001 เลเยอร์แพ็ท">PM-LYP-000001	เลเยอร์แพ็ท</option>
                    <option value="FG-MNR-000001 น้ำแร่บรรจุขวด 350 มิลลิลิตร MT">FG-MNR-000001	น้ำแร่บรรจุขวด 350 มิลลิลิตร MT</option>
                    <option value="FG-MNR-000002 น้ำแร่บรรจุขวด 520 มิลลิลิตร AF">FG-MNR-000002	น้ำแร่บรรจุขวด 520 มิลลิลิตร AF</option>
                    <option value="FG-MNR-000003 น้ำแร่บรรจุขวด 1,250 มิลลิลิตร OLD">FG-MNR-000003	น้ำแร่บรรจุขวด 1,250 มิลลิลิตร OLD</option>
                    <option value="FG-MNR-000004 น้ำแร่บรรจุขวด 1,250 มิลลิลิตร โปรโมชั่น MT">FG-MNR-000004	น้ำแร่บรรจุขวด 1,250 มิลลิลิตร โปรโมชั่น MT</option>
                    <option value="FG-MNR-000005 น้ำแร่บรรจุขวด 520 มิลลิลิตร Test">FG-MNR-000005	น้ำแร่บรรจุขวด 520 มิลลิลิตร Test</option>
                    <option value="FG-MNR-000006 น้ำแร่บรรจุขวด 520 มิลลิลิตร MT">FG-MNR-000006	น้ำแร่บรรจุขวด 520 มิลลิลิตร MT</option>
                    <option value="FG-MNR-000007 น้ำแร่บรรจุขวด 1,250 มิลลิลิตร MT">FG-MNR-000007	น้ำแร่บรรจุขวด 1,250 มิลลิลิตร MT</option>
                    <option value="FG-MNR-000008 น้ำแร่บรรจุขวด 350 มิลลิลิตร AF">FG-MNR-000008	น้ำแร่บรรจุขวด 350 มิลลิลิตร AF</option>
                    <option value="FG-MNR-000009 น้ำแร่บรรจุขวด 520 มิลลิลิตร โปรโมชั่น MT">FG-MNR-000009	น้ำแร่บรรจุขวด 520 มิลลิลิตร โปรโมชั่น MT</option>
                    <option value="PM-LBB-000004 ฉลากด้านหลัง น้ำแร่ ขนาด 520 มิลลิลิตร อย. เก่า">PM-LBB-000004	ฉลากด้านหลัง น้ำแร่ ขนาด 520 มิลลิลิตร อย. เก่า</option>
                    <option value="PM-LBB-000005 ฉลากด้านหลัง น้ำแร่ ขนาด 520 มิลลิลิตร อย. ใหม่ ผิด">PM-LBB-000005	ฉลากด้านหลัง น้ำแร่ ขนาด 520 มิลลิลิตร อย. ใหม่ ผิด</option>
                    <option value="PM-LBB-000006 ฉลากด้านหลัง น้ำแร่ ขนาด 1250 มิลลิลิตร อย. เก่า ผิด">PM-LBB-000006	ฉลากด้านหลัง น้ำแร่ ขนาด 1250 มิลลิลิตร อย. เก่า ผิด</option>
                    <option value="PM-SHF-000005 ฟิล์มหดแพ็คสำหรับน้ำแร่ขนาด 520 มล. MT">PM-SHF-000005	ฟิล์มหดแพ็คสำหรับน้ำแร่ขนาด 520 มล. MT</option>
                    <option value="PM-SHF-000006 ฟิล์มหดแพ็คสำหรับน้ำแร่ขนาด 1250 มล. MT">PM-SHF-000006	ฟิล์มหดแพ็คสำหรับน้ำแร่ขนาด 1250 มล. MT</option>
                    <option value="PM-SHF-000007 ฟิล์มหดแพ็คสำหรับน้ำแร่ขนาด 520 มล. เคลียร์">PM-SHF-000007	ฟิล์มหดแพ็คสำหรับน้ำแร่ขนาด 520 มล. เคลียร์</option>
                    <option value="PM-SHF-000008 ฟิล์มหดแพ็คโปรโมชั่นสำหรับน้ำแร่ขนาด 520 มล. MT">PM-SHF-000008	ฟิล์มหดแพ็คโปรโมชั่นสำหรับน้ำแร่ขนาด 520 มล. MT</option>                        
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Internal Batch</label>
                <input type="text" class="form-control" name="internal" aria-describedby="internal">
            </div>
            <div class="mb-3">
                <label class="form-label">External Batch</label>
                <input type="text" class="form-control" name="external" aria-describedby="external">
            </div>

            <div class="mb-3">
                <label class="form-label">จำนวน</label>
                <input type="text" class="form-control" name="amount" aria-describedby="amount">
            </div>

            <div class="row g-1">
                <label class="form-label">วันที่และเวลาที่ทำรายการ</label>
                <div class="col">
                    <input type="date" class="form-control" name="date2" aria-describedby="date2">
                </div>
                <div class="col">
                    <input type="time" class="form-control" name="time2" aria-describedby="time2">
                </div>
            </div>

            <div class="row g-1">
                <label class="form-label">วันที่และเวลาที่ต้องการสินค้า/ของ</label>
                <div class="col">
                    <input type="date" class="form-control" name="date1" aria-describedby="date1">
                </div>
                <div class="col">
                    <input type="time" class="form-control" name="time1" aria-describedby="time1">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">หมายเหตุ</label>
                <input type="text" class="form-control" name="note" aria-describedby="note">
            </div>
            <div class="mb-3">
                <button type="submit" name="save_line" class="btn btn-primary">Save</button>
            </div>
        </form>

    </div>

    <script>
    document.getElementById('submitForm').addEventListener('submit', function(event) {
        // ส่งข้อมูลไปยัง coded.php
        fetch('code.php', {
            method: 'POST',
            body: new FormData(this)
        });

        // ส่งข้อมูลไปยัง sendinfo.php
        fetch('sendinfo.php', {
            method: 'POST',
            body: new FormData(this)
        });

        // ยกเลิกการส่งฟอร์มเพื่อไม่ให้เกิดการโหลดหน้าใหม่หลังจากส่งข้อมูล
        event.preventDefault();
    });
    </script>
</body>

</html>