<?php
    
    include 'db.php';


    $sqli = "SELECT * FROM tip_nekretnine " ;
    $resi = mysqli_query($dbconn, $sqli);
    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Tip nekretnine</title>
</head>
<body>
    <table border=1px;>
        

        <thead>
            <tr>
                <th>
                ID
                </th>
                <th>
                Tip nekretnine
                </th>
                <th>
                Brisanje
                </th>
            </tr>
        </thead>
        <tbody>
           <?php
             
             while ($redi = mysqli_fetch_assoc($resi)){
                  
                  $id_tempo = $redi['id'];
                  $link7 = "<a href=\"izbrisi_tip_nekretnine.php?id=$id_tempo\">Brisanje</a>";
                  echo "<tr>";
                  echo "<td>".$id_tempo."</td>";
                  echo "<td>".$redi['tip']."</td>";
                  echo "<td>".$link7."</td>";

                  echo "</tr>";

             }
           
           
           
           
           ?>
        </tbody>
    </table>
    <a href = "novi_tip_nekretnine.php">Dodajte novi tip nekretnine</a>

</body>
</html>