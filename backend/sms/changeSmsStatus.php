<?php
require "../dbconn.php";

$smsID = $_GET['smsid'];

$update = $conn->query("UPDATE message SET status = 'Sent' WHERE id = '$smsID'");