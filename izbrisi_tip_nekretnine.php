<?php 
        
       include 'db.php';


        isset($_GET['id']) && is_numeric($_GET['id']) ? $id = $_GET['id'] : exit("ID ERROR");

       $sql = "DELETE FROM tip_nekretnine where id = $id ";
       $res = mysqli_query($dbconn, $sql);
  



       
        if ( $res ){
            header("location: tip_nekretnine.php?msg=deleted");
        }
        else {
            header("location: tip_nekretnine.php?msg=notdeleted");
        }


?>