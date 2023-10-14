<?php
session_start();
require_once 'header.php';
require_once 'conn.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include jQuery first -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

<!-- Include Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    
    <style>
        /* ===== Google Font Import - Poppins ===== */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');
        
        

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
    </style>
</head>
<body>
<section>
<?php
// Fetch data from the database
$sql = "SELECT * FROM sketch_detail"; // Assuming the table name is 'sketch_detail'
$result = $conn->query($sql);

if ($result === false) {
    // Handle query error
    echo "Error: " . $conn->error;
} elseif ($result->num_rows > 0) {
    echo '<table class="custom-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Sketch Type 2</th>
                    <th>Sketch Name 3</th>
                    <th>Sketch Price</th>
                    <th>Sketch Image</th>
                    <th>Sketch Feature</th>
                    <th></th>




                </tr>
            </thead>
            <tbody>';

            while ($row = $result->fetch_assoc()) {
                $productId = $row['product_id'];
                echo '<tr>';
                echo '<td>' . $row['product_id'] . '</td>';
                echo '<td>' . $row['type'] . '</td>';
                echo '<td>' . $row['name'] . '</td>';
                echo '<td>' . $row['price'] . '</td>';
                echo '<td><img src="'. $row['image'] . '" alt="Item Image" style="max-width: 100px; max-height:100px;"></td>';
                echo '<td>' . $row['feature'] . '</td>';
                echo '<td>';
                echo '<button class="btn btn-danger openModalButton" data-product-id="' . $productId . '">Edit</button>';
                echo '<a href="delete.php?product_id=' . $productId . '" class="btn btn-danger">Delete</a>';
                echo '</td>';
                echo '</tr>';
            }

    echo '</tbody></table>';
} else {
    echo "No data found in the database.";
}

$conn->close();
?>
</section>
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

                <form method="post" id="orderForm" enctype="multipart/form-data">
                <form method="post" action="edit.php" enctype="multipart/form-data" id="orderForm">
                 <input type="hidden" name="product_id" id="editProductId">
                 <div class="form-group">
                 <label for="type">Type of Sketch</label>
        <input type="text" class="form-control" name="type" id="editType" required>
    </div>
    <div class="form-group">
        <label for="new_name">Name:</label>
        <input type="text" class="form-control" name="new_name" id="editName">
    </div>
    <!-- Add more form fields as needed -->
    <button type="submit" class="btn btn-primary">Update</button>
</form>
            
            </div>
        </div>
    </div>
</div>
</body>
<script>
// Capture the "Edit" button click event
$(".openModalButton").click(function() {
    // Get the product_id from the button's data attribute
    var productId = $(this).data("product-id");

      // For now, we'll just simulate fetching data and populating the form fields
    var fakeProductData = {
        type: "Pencil",  // Replace with actual product data
        name: "Sketch Name",
        price: 100,
        // Add more fields as needed
    };

    // Populate the form fields with the fetched product data
    $("#editProductId").val(productId);
    $("#editType").val(fakeProductData.type);
    $("#editName").val(fakeProductData.name);
    // Populate more form fields here

    // Show the form modal
    $('#editModal').modal('show');
});
</script>
<!-- // Use AJAX to fetch product data by product_id (replace this with your actual AJAX request) -->

<script>
    // Function to open the modal
    $('.openModalButton').click(function() {
        var productId = $(this).data('product-id');
        $('#orderModal').modal('show');
        // You can use the productId to customize the modal content based on the product
    });
</script>
</html>