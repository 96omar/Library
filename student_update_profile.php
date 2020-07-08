<?php

include 'db.php';
session_start();

if (!$_SESSION['user_name2']) {

    header("Location: index2.php"); //redirect to the login page to secure the welcome page without login access.  
}
$userr = $_SESSION['user_name2'];

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of student_update_profile
 *
 * @author omark
 */
if (isset($_POST['btn_Save'])) {


    $edtStudentFirstName = $_POST['f_name'];
    $edtStudentLastName = $_POST['l_name'];
    $edtStudentEmail = $_POST['e_mail'];
    //$edtStudentUserName = $_POST['username'];
    $edtStudentRoll = $_POST['r_oll'];

    $ins_sql = "UPDATE `student` SET `first name`='$edtStudentFirstName',`last name`='$edtStudentLastName',`email`='$edtStudentEmail',`roll`='$edtStudentRoll' WHERE username = '$userr'";
    $run_sql = mysqli_query($conn, $ins_sql);

    if (!$run_sql) {
        die(json_encode(array('result' => false, 'message' => 'Could not enter data: ' . mysql_error())));
        ?>
        <script type="text/javascript">
            alert("Please Try Update profile Again");
            window.location = "Student_profile.php"
        </script>
        <?php

    } else {
        /* echo json_encode(array('result' => true, 'message' => 'Entered data successfully')); */
        ?>
        <script type="text/javascript">
            alert("Profile Update Successfully");
            window.location = "Student_profile.php"
        </script>
        <?php

    }
} else {
    echo '<p style="color: red">Error</p>';
}
?>
