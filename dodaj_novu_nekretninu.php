



<?php
     


      include 'db.php';

      isset($_POST['opis']) ? $opis = $_POST['opis'] : $opis = "Nepoznato";
      isset($_POST['povrsina']) ? $povrsina = $_POST['povrsina'] : $povrsina = "Nepoznato";
      isset($_POST['godina_izgradnje']) ? $godina_izgradnje = $_POST['godina_izgradnje'] : $godina_izgradnje = "Nepoznato";
      isset($_POST['cijena']) ? $cijena = $_POST['cijena'] : $cijena = "Nepoznato";
      isset($_POST['grad_id']) && is_numeric($_POST['grad_id']) ? $grad_id = $_POST['grad_id'] : $grad_id = "Nepoznato";
      isset($_POST['status_id']) && is_numeric($_POST['status_id']) ? $status_id = $_POST['status_id'] : $status_id = "Nepoznato";
      isset($_POST['tip_oglasa_id']) && is_numeric($_POST['tip_oglasa_id']) ? $tip_oglasa_id = $_POST['tip_oglasa_id'] : $tip_oglasa_id = "Nepoznato";
      isset($_POST['tip_nekretnine_id']) && is_numeric($_POST['tip_nekretnine_id']) ? $tip_nekretnine_id = $_POST['tip_nekretnine_id'] : $tip_nekretnine_id = "Nepoznato";
      if(isset($_FILES['fotografija'])){
          $original_name = $_FILES['fotografija']['name'];
          $tmp_name = $_FILES['fotografija']['tmp_name'];
          $temp_arr = explode(".",$original_name);
          $ext = $temp_arr[count($temp_arr)-1];
          $new_file_name = "./fotografije/".uniqid().".".$ext;
          copy($tmp_name,$new_file_name);
        }else{
            $new_file_name= "";
        }
          

       //dodavanje u bazu


       $sql_insert = "INSERT INTO nekretnina
                         (
                            opis,
                            povrsina,
                            godina_izgradnje,
                            cijena,
                            grad_id,
                            status_id,
                            tip_oglasa_id,
                            tip_nekretnine_id,
                            fotografija


                         ) 
                         VALUES 
                           (
                               '$opis',
                               '$povrsina',
                               '$godina_izgradnje',
                               '$cijena',
                               $grad_id,
                               $status_id,
                               $tip_oglasa_id,
                               $tip_nekretnine_id,
                               '$new_file_name'
                               
                               
                               
                           )
                         
                         
                   
                         
                         ";
            $res_insert = mysqli_query ($dbconn, $sql_insert);
           
         
            if($res_insert){
                 header("location: index.php?msg=nekretnina_dodata");
             }
             else{
                 header("location: index.php?msg=greska");
             }    
               
                         

?>