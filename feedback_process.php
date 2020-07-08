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
if (isset($_POST['s1'])) {
    $user = $_SESSION['user_name2'];
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $subject = $_POST['subject'];
    $country = $_POST['country'];

    $ins_sql = "INSERT INTO feedback VALUES ('' , '$user' ,'$fname', '$lname', '$country' , '$subject')";
    $run_sql = mysqli_query($conn, $ins_sql);

    if (!$run_sql) {
        die(json_encode(array('result' => false, 'message' => 'Could not enter data: ' . mysql_error())));
        ?>
        <script type="text/javascript">
            alert("Please Try Enter Your Feedback Again");
            window.location = "feedback.php"
        </script>
        <?php
    }else {
        /* echo json_encode(array('result' => true, 'message' => 'Entered data successfully')); */
        ?>
        <script type="text/javascript">
            alert("Thank You For Your Feedback");
            window.location = "feedback.php"
        </script>
        <?php

    }
} else {
    echo "Error: " . $ins_sql . "<br>" . $conn->error;
}
?>
 
