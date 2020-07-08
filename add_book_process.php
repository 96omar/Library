<?php

include 'db.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of feedback_process
 *
 * @author omark
 */
if (isset($_POST['btn'])) {
    
    $edBid = $_POST['bid'];
    $edName = $_POST['name'];
    $edAuthors = $_POST['authors'];
    $edEdition = $_POST['edition'];
    $edStatus = $_POST['status'];
    $edQuantity = $_POST['quantity'];
    $edDepartment = $_POST['department'];

    $ins_sql = "INSERT INTO books VALUES ('' ,'$edBid', '$edName', '$edAuthors' , '$edEdition' , '$edStatus' , '$edQuantity' , '$edDepartment')";
    $run_sql = mysqli_query($conn, $ins_sql);

    if (!$run_sql) {
        die(json_encode(array('result' => false, 'message' => 'Could not enter data: ' . mysql_error())));
        ?>
        <script type="text/javascript">
            alert("Please Try Enter Again");
            window.location = "add_book.php"
        </script>
        <?php

    } else {
        /* echo json_encode(array('result' => true, 'message' => 'Entered data successfully')); */
        ?>
        <script type="text/javascript">
            alert("Book Added Successfully");
            window.location = "admin_book.php"
        </script>
        <?php

    }
} else {
    echo "Error: " . $ins_sql . "<br>" . $conn->error;
}
?>
 
