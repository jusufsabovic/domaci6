<?php 
        
       include 'db.php';


        isset($_GET['id']) && is_numeric($_GET['id']) ? $id = $_GET['id'] : exit("ID ERROR");

       $sql = "SELECT * FROM nekretnina where id = $id ";
       $res = mysqli_query($dbconn, $sql);
       $brojac = mysqli_num_rows($res);



       if($brojac == 0){
           exit("Ne postoji nekretnina sa ovim ID-em");
       }





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Izmijeni nekretninu</title>
</head>
<body>
    <form action="./izmijeni_neku_nekretninu.php" method="POST">
         <input type="hidden" name="id" value="<?=$id?>">
         <select name="grad_id" id="" reqired>
                <option value="">Odaberite grad</option>
                <?php
                    

                    
                     $res = mysqli_query($dbconn, " SELECT * FROM grad ORDER BY ime ASC");
                     $city_id = $nekretnina['grad_id'];
                     while($row = mysqli_fetch_assoc($res)){
                            $id_temp = $row['id'];
                            $name_temp = $row['ime'];
                            $select = "";
                            if($grad_id == $id_temp){
                                $select = "selected";
                            }
                            echo "<option value=\"$id_temp\" $select > $name_temp</option>";
                      }
                       
                 ?>
                 
         </select> 
         <select name="status_id" id="" reqired>
                <option value="">Status vaše nekretnine: </option>
                <?php
                  

                    
                     $res = mysqli_query($dbconn, " SELECT * FROM status ORDER BY status");
                     while($row = mysqli_fetch_assoc($res)){
                            $id_temp = $row['id'];
                            $name_temp = $row['status'];
                            echo "<option value=\"$id_temp\" > $name_temp</option>";
                     }
                 ?>
         </select>  
         <select name="tip_oglasa_id" id="" reqired>
                <option value="">Vaš oglas je kojeg tipa? </option>
                <?php
                  

                    
                     $res = mysqli_query($dbconn, " SELECT * FROM tip_oglasa ORDER BY tip_oglasa ASC");
                     while($row = mysqli_fetch_assoc($res)){
                            $id_temp = $row['id'];
                            $name_temp = $row['tip_oglasa'];
                            echo "<option value=\"$id_temp\" > $name_temp</option>";
                     }
                 ?>
         </select>  
         <select name="tip_nekretnine_id" id="" reqired>
                <option value="">Vaša nekretnina je kojeg tipa? </option>
                <?php
                  

                    
                     $res = mysqli_query($dbconn, " SELECT * FROM tip_nekretnine ORDER BY tip ASC");
                     while($row = mysqli_fetch_assoc($res)){
                            $id_temp = $row['id'];
                            $name_temp = $row['tip'];
                            echo "<option value=\"$id_temp\" > $name_temp</option>";
                     }
                 ?>
                 </select>
              

         <button>SAČUVAJ</button>




    </form>
</body>
</html>
