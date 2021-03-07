<?php 

        include 'db.php';
            
        
        $where_arr[] = " 1 = 1 ";
           if(isset($_GET['opis']) && $_GET['opis'] > "0"){
              $opis = strtolower($_GET['opis']);
              $where_arr[] = " lower(opis) LIKE '%$opis%' ";
              }
           if(isset($_GET['povrsina']) && $_GET['povrsina'] > "0"){
               $povrsina = strtolower($_GET['povrsina']);
               $where_arr[] = " lower(povrsina) LIKE '%$povrsina%' ";
                }
           if(isset($_GET['cijena']) && $_GET['cijena'] > "0"){
                $cijena = strtolower($_GET['cijena']);
                $where_arr[] = " lower(cijena) LIKE '%$cijena%' ";
                }    
            if(isset($_GET['godina_izgradnje']) && $_GET['godina_izgradnje'] > "0"){
                $godina_izgradnje = strtolower($_GET['godina_izgradnje']);
                $where_arr[] = " lower(godina_izgradnje) LIKE '%$godina_izgradnje%' ";
                }
            if (isset($_GET['cijenaod']) && $_GET['cijenaod'] != "") {
                $cijena1 = $_GET['cijenaod'];
                $where_arr[] = " cijena >= $cijena1 ";
                }
            if (isset($_GET['cijenado']) && $_GET['cijenado'] != "") {
                $cijena2 = $_GET['cijenado'];
                $where_arr[] = " cijena <= $cijena2 "; }
            
                
            
      
            $where_str = implode("AND", $where_arr);
            // var_dump($where_str);
      
      
      
            $sql = "SELECT n.id, n.cijena, n.povrsina, g.ime, tn.tip, t_o.tip_oglasa, n.opis, n.godina_izgradnje
                    FROM nekretnina n, grad g, tip_nekretnine tn, tip_oglasa t_o
                    WHERE n.grad_id=g.id
                    AND n.tip_nekretnine_id=tn.id
                    AND n.tip_oglasa_id=t_o.id
                    AND $where_str" ;
              $res = mysqli_query($dbconn, $sql);
              $brojac = mysqli_num_rows($res);
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Agencija za nekretnine</title>
</head>
<body>
<form action="index.php" method="GET"> 
<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Opis</span>
  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="opis">
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Povrsina</span>
  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="povrsina">
</div>  
<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Godina izgradnje</span>
  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="godina_izgradnje">
</div>
         <//input type="text" name="godina_izgradnje" placeholder="Godina izgradnje">
         <input type="number" name="cijenaod" placeholder="Cijena od...">
         <input type="number" name="cijenado" placeholder="Cijena do...">
         
            


         <button type="button" class="btn btn-primary">Pretraga</button>
</form>

    <br>
    <br>
<table border=1px; class="table-success">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Opis</th>
            <th scope="col">Površina</th>
            <th scope="col">Cijena</th>
            <th scope="col">Godina izgradnje</th>
            <th scope="col">Grad</th>
            <th scope="col">Tip nekretnine</th>
            <th scope="col">Tip oglasa</th>
            <th scope="col">Detalji</th>
            <th scope="col">Brisanje</th>
            <th scope="col">Izmjena</th>

          </tr>
        </thead>
        <tbody>
             <?php
                while ($row = mysqli_fetch_assoc($res)){
                    $id_temp = $row['id'];
                    $link1 = "<a href=\"nekretnina.php?id=$id_temp\">Detalji</a>";
                    $link2 = "<a href=\"izbrisi_nekretninu.php?id=$id_temp\">Brisanje</a>";
                    $link3 = "<a href=\"izmijeni_nekretninu.php?id=$id_temp\">Izmijena</a>";
                    
          
                    
                    echo "<tr>";
                    echo "<td>".$id_temp."</td>";
                    echo "<td>".$row['opis']."</td>";
                    echo "<td>".$row['povrsina']."</td>";
                    echo "<td>".$row['cijena']."</td>";
                    echo "<td>".$row['godina_izgradnje']."</td>";
                    echo "<td>".$row['ime']."</td>";
                    echo "<td>".$row['tip']."</td>";
                    echo "<td>".$row['tip_oglasa']."</td>";
                    echo "<td>".$link1."</td>";
                    echo "<td>".$link2."</td>";
                    echo "<td>".$link3."</td>";



                    

                      
                }


             ?>
        </tbody>
    </table>
    <p>Ukupno: <?=$brojac?></p>

    <a href="nova_nekretnina.php">Dodajte novu nekretninu</a>
    <a href="status.php">Prikazite tabelu status</a>
    <a href="tip_nekretnine.php">Prikažite tabelu tip nekrentine</a>
    <a href="grad.php">Prikažite tabelu gradova</a>
    <a href="tip_oglasa.php">Prikažite tabelu oglasa</a>





   

</body>
</html>