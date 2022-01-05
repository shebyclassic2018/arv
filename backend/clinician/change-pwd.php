<?php
session_start();
require "../dbconn.php";
$opwd = $_POST['opwd'];
$npwd = $_POST['npwd'];
$cpwd = $_POST['cpwd'];
$user_id = $_SESSION['user_id'];

$select = $conn->query("SELECT * FROM user WHERE id = '$user_id' AND password = '$opwd'");
if (mysqli_num_rows($select) > 0) {
    if ($npwd == $cpwd) {
        $update = $conn->query("UPDATE user SET password = '$npwd' WHERE id = '$user_id'");
        if ($update) {
            $_SESSION['alert'] = "Password changed";
        } else {
            $_SESSION['alert'] = "Password not changed";
        }
    } else {
        $_SESSION['alert'] = "Password not match";
    }
} else {
    $_SESSION['alert'] = "Old password is incorrect";
}

header("location: ../../change-pwd.php");