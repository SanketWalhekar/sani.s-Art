<?php
session_start();
require_once 'header.php';
require_once 'conn.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- jQuery -->
<!-- Add your CSS and Bootstrap includes here -->

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
    <title>Custom Table Design</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    
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
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            <?php
            if (isset($_SESSION['delete_success']) && $_SESSION['delete_success']) {
                echo 'Swal.fire("Good job!", "Deleted Sucessfully!", "success");';
                unset($_SESSION['delete_success']); // Clear the session variable
            }
            ?>
        });
    </script>
    
     
     <script>
         document.addEventListener("DOMContentLoaded", function() {
             <?php
             if (isset($_SESSION['edit_success']) && $_SESSION['edit_success']) {
                 echo 'Swal.fire("Good job!", "Product Updated Sucessfully", "success");';
                 unset($_SESSION['edit_success']); // Clear the session variable
             }
             ?>
         });
     </script>

<script>
         document.addEventListener("DOMContentLoaded", function() {
             <?php
             if (isset($_SESSION['edit1_success']) && $_SESSION['edit1_success']) {
                 echo 'Swal.fire("Good job!", "Product Updated Sucessfully", "success");';
                 unset($_SESSION['edit1_success']); // Clear the session variable
             }
             ?>
         });
     </script>
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
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>';

        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['product_id'] . '</td>';
            echo '<td>' . $row['type'] . '</td>';
            echo '<td>' . $row['name'] . '</td>';
            echo '<td>' . $row['price'] . '</td>';
            echo '<td><img src="' . $row['image'] . '" alt="Item Image" style="max-width: 100px; max-height:100px;"></td>';
            echo '<td>' . $row['feature'] . '</td>';
            echo '<td>';
            echo '<a href="edit.php?product_id=' . $row['product_id'] . '" class="btn btn-success">Edit</a>';
            echo '<a href="delete.php?product_id=' . $row['product_id'] . '" class="btn btn-danger">Delete</a>';
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


</body>
</html>