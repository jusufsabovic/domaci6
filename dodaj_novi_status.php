<?php

    include 'db.php';

    isset($_POST['status']) ? $status = $_POST['status'] : $status = "ERROR";

    $sql_insert = "INSERT INTO status (status) VALUES ('$status')";

    $res_insert = mysqli_query($dbconn, $sql_insert);

    if($res_insert){
        header("location: index.php?msg=status_dodat");
    }else{  
        header("location: index.php?msg=greska_pri_dodavanju");
    }
    
?>
