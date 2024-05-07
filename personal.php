<?php
session_start();
require 'dbcon.php';
?>
<?php   
require 'nav.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ของปอน</title>
    <?php include('message.php'); ?>
    <link href="css/bootstrap-grid.min.css" rel="stylesheet">

    <link href="dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
    /* Custom CSS for table */
    .table {
        font-size: 14px;
        /* Adjust font size */
    }

    .table th,
    .table td {
        vertical-align: middle;
        /* Align content vertically center */
    }

    .table th {
        text-align: center;
        /* Align header text center */
    }

    .btn-group {
        display: flex;
        justify-content: center;
    }

    .btn-group button {
        margin: 2px;
    }
    </style>
</head>

<body>

    <div class="dashboard">
        <h1 class="h3 mb-0 text-gray-800">POND WH</h1>
    </div>
    <div class="dashboard">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-13">
                <div class="card">
                    <div class="card-header">
                        <h4>Pallet list</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Department</th>
                                        <th>Goods</th>
                                        <th>Amount</th>
                                        <th>Requested time</th>
                                        <th>Required time</th>
                                        <th>Internal,External</th>
                                        <th>Status</th>
                                        <th>leaf_status</th>
                                        <th>Note</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $query = "SELECT * FROM line";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $line)
                                        {
                                ?>
                                    <tr>
                                        <td><?= $line['id']; ?></td>
                                        <td><?= $line['name']; ?></td>
                                        <td><?= $line['department']; ?></td>
                                        <td><?= $line['goods']; ?></td>
                                        <td><?= $line['amount']; ?></td>
                                        <td><?= $line['time2'] . '::' . $line['date2']; ?></td>
                                        <td><?= $line['time1'] . ':: ' . $line['date1']; ?></td>
                                        <td><?= $line['internal'] . ':: ' . $line['external']; ?></td>

                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                <form action="borrow.php" method="post">
                                                    <input type="hidden" name="id" value="<?= $line['id']; ?>">
                                                    <button type="submit" name="status" value="ส่งแล้ว"
                                                        class="btn btn-success">ส่งแล้ว</button>
                                                    <button type="submit" name="status" value="ยังไม่ส่ง"
                                                        class="btn btn-warning">ยังไม่ส่ง</button>
                                                </form>
                                            </div>
                                            <?= $line['status']; ?>
                                        </td>

                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                <form action="leaf_status.php" method="post">
                                                    <input type="hidden" name="id" value="<?= $line['id']; ?>">
                                                    <button type="submit" name="leaf_status" value="กำลังจัดเตรียมของ"
                                                        class="btn btn-warning">กำลังจัดเตรียมของ</button>
                                                    <button type="submit" name="leaf_status" value="จัดเตรียมของแล้ว"
                                                        class="btn btn-primary">จัดเตรียมของแล้ว</button>
                                                    <button type="submit" name="leaf_status" value="ยกเลิก"
                                                        class="btn btn-danger">ยกเลิก</button>
                                                    <button type="submit" name="leaf_status" value="เสร็จสิ้น"
                                                        class="btn btn-success">เสร็จสิ้น</button>
                                                </form>
                                            </div>
                                            <?= $line['leaf_status']; ?>
                                        </td>


                                        <td><?= $line['note']; ?></td>
                                    </tr>
                                    <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>