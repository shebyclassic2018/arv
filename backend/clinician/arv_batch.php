<?php
$branch_id = @$_GET['branch_id'];
$req_id = @$_GET['req_id'];
include "backend/dbconn.php";
$stmt = "SELECT 
quantity AS qty,
batch_date AS arr_date,
b.name AS branch,
u.id as uid,
u.name as uname,
sex,
pno AS phone,
ward,
country,
district,
region,
dob,
type,
address AS email,
DATE(created_at) AS date
FROM 
user u,
address a,
phone p,
email e,
role r, 
branch b,
arv_store arv
WHERE
r.id = u.role_id AND
u.branch_id = b.id AND
u.id = p.user_id AND
u.id = e.user_id AND 
u.id = a.user_id AND
u.id = arv.user_id AND
b.id = arv.branch_id AND
r.type IN ('clinician', 'administrator')
ORDER BY arv.id DESC
";

$batch = $conn->query($stmt);

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

//GET BRANCHES
if(isset($_GET['branch_id'])) {
    $branch = $conn->query("SELECT * FROM branch WHERE name != 'none' AND id = '$branch_id'");
} else {
    $branch = $conn->query("SELECT * FROM branch WHERE name != 'none' ORDER BY name ASC");
}