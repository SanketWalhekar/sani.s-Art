<?php
session_start();

require_once 'header.php';
require_once 'conn.php';

$sort = 'desc';

// Check if the sort parameter is set
if (isset($_GET['sort'])) {
    $sort = $_GET['sort'];
    // Validate the sorting order
    if ($sort !== 'asc' && $sort !== 'desc') {
        $sort = 'desc'; // Default to descending order if an invalid value is provided
    }
}

// Construct the SQL query with the sorting order
$sql = "SELECT * FROM sketch_order ORDER BY time $sort";

$result = $conn->query($sql);

if (!$result) {
    die("Query failed: " . $conn->error);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
 <!-- Include jQuery -->
 <!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
        document.addEventListener("DOMContentLoaded", function() {
            <?php
            if (isset($_SESSION['registration_success']) && $_SESSION['registration_success']) {
                echo 'Swal.fire("Good job!", "Mail Sent Sucessfully!", "success");';
                unset($_SESSION['registration_success']); // Clear the session variable
            }
            ?>
        });
    </script>

<!-- Include Bootstrap CSS and JavaScript -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Table Design</title>
    <style>
        /* ===== Google Font Import - Poppins ===== */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');
        
        
        /* ... Your existing CSS styles ... */

        /* Custom table styles */
        .custom-table {
            width: 100%;
            border-collapse: collapse;
            background-color: var(--panel-color);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            margin: 20px 0;
        }

        .custom-table th,
        .custom-table td {
            padding: 12px 16px;
            text-align: left;
            border-bottom: 1px solid var(--border-color);
        }

        .custom-table thead {
            background-color: var(--box1-color);
            color: var(--text-color);
        }

        .custom-table tbody tr:nth-child(even) {
            background-color: var(--box2-color);
        }

        .custom-table tbody tr:hover {
            background-color: var(--box3-color);
            transition: var(--tran-03);
        }
        .custom-table tbody th:nth-child(even) {
            background-color: var(--box2-color);
        }
        .custom-table tbody th:hover {
            background-color: var(--box3-color);
            transition: var(--tran-03);
        }
        .button-container {
    display: inline;
}
    /* Reduce the width of the "Image" and "Size" columns */
    .custom-table th:nth-child(3), .custom-table td:nth-child(3),
    .custom-table th:nth-child(4), .custom-table td:nth-child(4) {
        width: 50px; /* Adjust the width as needed */
    }

    /* Add styles for the new columns */
    .custom-table th:nth-child(7), .custom-table td:nth-child(7),
    .custom-table th:nth-child(8), .custom-table td:nth-child(8) {
        width: 80px; /* Adjust the width as needed */
    }

    </style>
</head>
<body>
<section>
<!-- <a href="demo.php?sort=asc">Sort by Date (Ascending)</a>
<a href="demo.php?sort=desc">Sort by Date (Descending)</a> -->
<?php
// Fetch data from the database
// $sql = "SELECT * FROM sketch_order"; // Assuming the table name is 'sketch_detail'
// $result = $conn->query($sql);

if ($result === false) {
    // Handle query error
    echo "Error: " . $conn->error;
} elseif ($result->num_rows > 0) {
    echo '<table class="custom-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>

                    <th>Image</th>

                    <th>Size</th>
                    <th>Frame</th>
                    <th>Requirement</th>
                    <th></th>

                 
              </tr>
             </thead>
             <tbody>';

             while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['name'] . '</td>';
                echo '<td>' . $row['email'] . '</td>';
                echo '<td><img src="'. $row['image'] . '" alt="Item Image" style="max-width: 100px; max-height:100px;"></td>';
                echo '<td>' . $row['size'] . '</td>';
                echo '<td>' . $row['frame'] . '</td>';
                echo '<td>' . $row['requirement'] . '</td>';
                echo '<td>';
                if ($row["status"] == 0) {
                    echo '<button class="btn btn-danger openModalButton" data-order-id="' . $row['order_id'] . '">Received</button>';
                } elseif ($row["status"] == 2) {
                    echo '<button class="btn btn-success">Confirmed</button>';
                } else {
                    echo '<button class="btn btn-info">Mail Sent</button>';
                }
                


                echo '</td>';
                


                

                
                echo '</tr>';
            }
        }
else {
    echo "No data found in the database.";
}

$conn->close();
?>
</section>
<!-- Modal -->
<div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="orderModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="orderModalLabel">Order Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form id="orderForm" action="process_order.php" method="POST">
            <input type="hidden" id="order-id-input" name="order_id" value="">
                 <div class="form-group">
                     <label for="price">Price</label>
                     <input type="text" class="form-control"  id="price" name="price" placeholder="Enter price" required>
                </div>
                <div class="form-group">
                     <label for="Desc">Information</label>
                     <input type="textarea" class="form-control"  id="info" name="info" placeholder="Enter Any Info" required>
                </div>
            
            
                <input type="submit" class="btn btn-secondary" value="Submit" style="float: right;">

            </form>

            </div>
        </div>
    </div>
</div>
<script>
document.querySelectorAll('.openModalButton').forEach(function(button) {
    button.addEventListener('click', function() {
        // Get the order ID from the data-order-id attribute
        var orderId = button.getAttribute('data-order-id');

        // You can now use this orderId to fetch additional information about the order and populate the modal form
        // For demonstration purposes, we'll just set the order ID in the modal form's input field
        document.getElementById('order-id-input').value = orderId;

        $('#orderModal').modal('show');
    });
});
</script>

</script>


</body>


</html>

