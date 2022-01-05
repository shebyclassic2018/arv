<?php
session_start();
require "dbconn.php";
$email = $_POST['email'];
$pwd = $_POST['password'];

$stmt = "SELECT * FROM email e, user u, role r WHERE r.id = u.role_id AND u.id = e.user_id AND e.address = '$email' AND password = '$pwd' AND password != ''";
$select = $conn->query($stmt);

$found = mysqli_num_rows($select);
if( $found == 1) {
    foreach ($select as $key => $row) {
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['branch_id'] = $row['branch_id'];
        $user_id = $row['user_id'];
        $_SESSION['username'] = $row['name'];
        $_SESSION['role'] = $row['type'];
        $role = $row['type'];
    }
    header('location: ../register-patient.php');
} else {
    $_SESSION['danger'] = "Either password or email is incorrect";
    header("location: ../");
}