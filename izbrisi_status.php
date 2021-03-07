<?php 
        
       include 'db.php';


        isset($_GET['id']) && is_numeric($_GET['id']) ? $id = $_GET['id'] : exit("ID ERROR");

       $sql = "DELETE FROM status where id = $id ";
       $res = mysqli_query($dbconn, $sql);
  



       
        if ( $res ){
            header("location: index.php?msg=deleted");
        }
        else {
            header("location: index.php?msg=notdeleted");
        }


?>