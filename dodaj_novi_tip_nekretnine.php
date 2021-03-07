<?php

    include 'db.php';

    isset($_POST['nekr']) ? $nekr = $_POST['nekr'] : $nekr = "ERROR";

    $sql_insert = "INSERT INTO tip_nekretnine (tip) VALUES ('$nekr')";

    $res_insert = mysqli_query($dbconn, $sql_insert);

    if($res_insert){
        header("location: index.php?msg=oglas_dodat");
    }else{  
        header("location: index.php?msg=greska_pri_dodavanju");
    }
    
?>