<?php
// Include the database config file 
include('../database.php');

if (!empty($_POST["categories_id"])) {
    // Fetch state data based on the specific country 
    $query = "SELECT * FROM sub_categories WHERE categories_id = " . $_POST['categories_id'] . " AND status = 1";
    $result = $con->query($query);

    // Generate HTML of state options list 
    if ($result->num_rows > 0) {
        echo '<option value="">Select State</option>';
        while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row['sub_categories_id'] . '">' . $row['sub_categories_name'] . '</option>';
        }
    } else {
        echo '<option value="">Sub Category not available</option>';
    }
}
