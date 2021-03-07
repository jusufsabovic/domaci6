<?php 
        
       include 'db.php';


        isset($_GET['id']) && is_numeric($_GET['id']) ? $id = $_GET['id'] : exit("ID ERROR");

       $sql = "SELECT 
               nekretnina.*,
               grad.ime as grad_ime,
               tip_oglasa.tip_oglasa as oglas,
               status.status as status,
               tip_nekretnine.tip as tip
               
            FROM nekretnina 
            LEFT JOIN grad on nekretnina.grad_id = grad.id  
            LEFT JOIN tip_oglasa on nekretnina.tip_oglasa_id = tip_oglasa.id
            LEFT JOIN status on nekretnina.status_id = status.id
            LEFT JOIN tip_nekretnine on nekretnina.tip_nekretnine_id = tip_nekretnine.id


            
            where nekretnina.id = $id ";
           
       $res = mysqli_query($dbconn, $sql);
       $brojac = mysqli_num_rows($res);



       if($brojac == 0){
           exit("Ne postoji nekretnina sa ovim ID-em");
       }


       $nekretnina = mysqli_fetch_assoc($res);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Detalji o nekretnini <?=$id?></title>
</head>
<body>
    <p>Opis: <?=$nekretnina['opis']?></p>
    <p>Površina: <?=$nekretnina['povrsina']?></p>
    <p>Cijena: <?=$nekretnina['cijena']?></p>
    <p>Godina izgradnje: <?=$nekretnina['godina_izgradnje']?></p>
    <p>Grad: <?=$nekretnina['grad_ime']?></p>
    <p>Tip oglasa: <?=$nekretnina['oglas']?></p>
    <p>Status: <?=$nekretnina['status']?></p>
    <p>TIp nekretnine: <?=$nekretnina['tip']?></p>
    <img src=" <?=$nekretnina['fotografija']?>" alt="" width="500" >

</body>
</html>