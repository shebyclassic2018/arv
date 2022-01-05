<?php 
 require "../dbconn.php";

 $pid = $_POST['pid'];

 if (substr($pid, 0, 2) == "PT") {
        $pid = substr($pid, 2, 10);
        $data = $conn->query("SELECT * FROM fingerprint WHERE pid = '$pid'");
        $row = $data->fetch_assoc();
        
        if (mysqli_num_rows($data) > 0) {
            echo $row['templates'];  
        } else {
            echo "No fingerprint detected";
        }
 }