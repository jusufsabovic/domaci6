<?php
     


      include 'db.php';
      isset($_POST['id']) && is_numeric($_POST['id'])  ? $id = $_POST['id'] : $id = "Nepoznato";
      isset($_POST['opis']) ? $opis = $_POST['opis'] : $opis = "Nepoznato";
      isset($_POST['povrsina']) ? $povrsina = $_POST['povrsina'] : $povrsina = "Nepoznato";
      isset($_POST['godina_izgradnje']) ? $godina_izgradnje = $_POST['godina_izgradnje'] : $godina_izgradnje = "Nepoznato";
      isset($_POST['cijena']) ? $cijena = $_POST['cijena'] : $cijena = "Nepoznato";
      isset($_POST['grad_id']) ? $grad_id = $_POST['grad_id'] : $grad_id = "Nepoznato";
      isset($_POST['status_id']) ? $status_id = $_POST['status_id'] : $status_id = "Nepoznato";
      isset($_POST['tip_nekretnine_id']) ? $tip_nekretnine_id = $_POST['tip_nekretnine_id'] : $tip_nekretnine_id = "Nepoznato";
      isset($_POST['tip_oglasa_id']) ? $tip_oglasa_id = $_POST['tip_oglasa_id'] : $tip_oglasa_id = "Nepoznato";


       //dodavanje u bazu


       $sql_update = 
                        "
                        UPDATE nekretnina SET 
                                  opis= '$opis',
                                  povrsina= '$povrsina',
                                  godina_izgradnje= '$godina_izgradnje',
                                  cijena= '$cijena',
                                  grad_id= '$grad_id',
                                  status_id= '$status_id',
                                  tip_nekretnine_id = '$tip_nekretnine_id',
                                  tip_oglasa_id= '$tip_oglasa_id'
                                  
                                  
                                  

                        WHERE id = $id          
                        ";
                        
           
         $res_update = mysqli_query ($dbconn, $sql_update) ;
             if($res_update){
                 header("location: index.php?msg=izmjena napravljena");
             }
             else{
                 header("location: index.php?msg=greska");
             }  
             
       
             
                         

?>