<?php
    
    include 'db.php';


    $sqli = "SELECT * FROM tip_oglasa " ;
    $resi = mysqli_query($dbconn, $sqli);
    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Tip oglasa</title>
</head>
<body>
    <table border=1px;>
        

        <thead>
            <tr>
                <th>
                ID
                </th>
                <th>
                Tip oglasa
                </th>
            </tr>
        </thead>
        <tbody>
           <?php
             
             while ($redi = mysqli_fetch_assoc($resi)){

                  $id_tempo = $redi['id'];
                  

                  echo "<tr>";
                  echo "<td>".$id_tempo."</td>";
                  echo "<td>".$redi['tip_oglasa']."</td>";
                 
                  echo "</tr>";

             }
           
           
           
           
           ?>
        </tbody>
    </table>
    
</body>
</html>