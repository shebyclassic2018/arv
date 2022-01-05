<?php
include "backend/dbconn.php";
$pid = $_GET['pid'];
$pid = substr($pid, 2, 10);
$branch_id = $_SESSION['branch_id'];
$stmt = "SELECT 
* 
FROM 
user u, 
patient_doctor pd, 
record r 
WHERE 
u.id = pd.pid AND 
r.id = pd.rid AND 
pd.pid = '$pid'
ORDER BY r.id DESC";

$record = $conn->query($stmt);

// get total arvs in store
$select = $conn->query("SELECT sum(quantity) as total FROM arv_store WHERE branch_id = '$branch_id'");
foreach($select as $row){}
$arvinStock = $row['total'];

// get total supplied arvs
$select = $conn->query("SELECT sum(quantity_used) as total FROM record WHERE branch_id = '$branch_id'");
foreach($select as $row){}
$userARVs = $row['total'];

// Remaining ARVs in stock
$remainsARVs = $arvinStock - $userARVs;