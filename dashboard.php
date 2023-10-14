<?php
require_once 'header.php';
require_once 'conn.php';
$receivedStatus = 0;

// Perform the SQL query to count received orders
$sql = "SELECT COUNT(*) AS received_count FROM sketch_order";
$result = $conn->query($sql);

if ($result) {
    $row = $result->fetch_assoc();
    $receivedCount = $row['received_count'];
}

$sql1 = "SELECT COUNT(*) AS received_count1 FROM sketch_detail";
$result1 = $conn->query($sql1);

if ($result1) {
    $row1 = $result1->fetch_assoc();
    $receivedCount1 = $row1['received_count1'];
}

?>
     <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Dashboard</a></span>
                </div>

                <div class="boxes">
                    <div class="box box1">
                        <i class="uil uil-chart"></i>
                        <span class="text">Total Customized Order</span>
                        <span class="number"><?php echo $receivedCount; ?></span>
                    </div>
                    <div class="box box2">
                        <i class="uil uil-folder-open"></i>
                        <span class="text">Total Sketches</span>
                        <span class="number"><?php echo $receivedCount1; ?></span>
                    </div>
                    <div class="box box3">
                        <i class="uil uil-parcel"></i>
                        <span class="text">Total Orders</span>
                        <span class="number">0</span>
                    </div>
                </div>
            </div>
        </div>
