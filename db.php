<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of db
 *
 * @author omark
 */
$server = "localhost";
$user = "root";
$password = "";
$db = "library";

$conn = mysqli_connect($server, $user, $password, $db);

if (!$conn) {
    die("Connection Failed!: " . mysqli_connect_error());
} elseif ($conn) {
    mysqli_select_db($conn,$db);
    /*print 'sucses';*/
    
}

/* $datbase=mysqli_connect("localhost","root","","library"); */
?>
