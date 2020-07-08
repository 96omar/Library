<?php

include 'db.php';
session_start();
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
if (isset($_GET['btn2'])) {

    $massage = $_GET['msg'];
    $user = $_SESSION['user_name2'];

    $ins_sql = "INSERT INTO massage VALUES ('' ,'$user', '$massage', 'no' , 'student')";
    $run_sql = mysqli_query($conn, $ins_sql);

    if (!$run_sql) {
        die(json_encode(array('result' => false, 'message' => 'Could not enter data: ' . mysql_error())));
        ?>
        <script type="text/javascript">
            alert("Please Try Enter your massage Again");
            window.location = "index.php"
        </script>
        <?php

    } else {
        /* echo json_encode(array('result' => true, 'message' => 'Entered data successfully')); */
        ?>
        <script type="text/javascript">
            alert("Massage Sent To Admin And admin While Responde To You Soon Thank You");
            window.location = "index.php"
        </script>
        <?php

    }
} else {
    echo "Error: " . $ins_sql . "<br>" . $conn->error;
    echo 'error';
}
?>
 
