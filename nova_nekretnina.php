

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj novu nekretninu</title>
</head>
<body>
    <form action="./dodaj_novu_nekretninu.php" method="POST" enctype="multipart/form-data">
         <input type="text" name="opis" placeholder="Opis">
         <input type="text" name="povrsina" placeholder="Povrsina">
         <input type="text" name="godina_izgradnje" placeholder="Godina izgradnje">
         <input type="text" name="cijena" placeholder="Cijena">
         <select name="grad_id" id="" reqired>
                <option value="">Odaberite grad</option>
                <?php
                    include 'db.php';

                    
                     $res = mysqli_query($dbconn, " SELECT * FROM grad ORDER BY ime ASC");
                     while($row = mysqli_fetch_assoc($res)){
                            $id_temp = $row['id'];
                            $name_temp = $row['ime'];
                            echo "<option value=\"$id_temp\" > $name_temp</option>";
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
                 <td>Izaberi sliku:</td>
                    <td>
                        <input type="file"  name="fotografija">  
                    </td>
                 
         <button>SAČUVAJ</button>




    </form>
</body>
</html>