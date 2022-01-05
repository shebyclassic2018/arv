<?php 
    $stmt = "SELECT 
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
        role r
    WHERE
        r.id = u.role_id AND
        u.id = p.user_id AND
        u.id = e.user_id AND 
        u.id = a.user_id AND
        r.type IN ('clinician', 'administrator')
    ORDER BY u.id DESC";

    $clinicianList = $conn->query($stmt);
?>