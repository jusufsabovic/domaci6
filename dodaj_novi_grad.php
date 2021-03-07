<?php
     


      include 'db.php';

      isset($_POST['ime']) ? $ime = $_POST['ime'] : $ime = "Greška! Morate unijeti naziv grada.";
      

       //dodavanje u bazu


       $sql_insert = "INSERT INTO grad (ime) VALUES ('$ime')";
                        
                      

         $res_insert = mysqli_query ($dbconn, $sql_insert) ;
             if($res_insert){
                 header("location: index.php?msg=grad_je_dodat");
             }
             else{
                 header("location: index.php?msg=greska");
             }           
                         

?>
