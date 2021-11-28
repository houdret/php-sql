<?php
$bdd = new PDO('mysql:host=localhost;dbname=colyseum', 'root', '');

$resultat = $bdd->query('SELECT * FROM bookings WHERE id BETWEEN 24 AND 25');
$id_25 = 25;  
$id_24 = 24;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <title>Suppression des réservations 24  et 25</title>
</head>
<body>
<div class="container">
    <a href="/php-sql/crud/index.php" class="text-decoration-none">Liste des données</a>
        
    <?php 
        while ($fetch = $resultat->fetch()) {
    ?>
        <form action="Delete_reservation.php" method="post">
            <label for="id" >Numéro réservation : </label>
			<input type="number" name="id" value="<?= $fetch['id']; ?>"><br/>
		
			<label for="clientId" >Numéro client : </label>
			<input type="number" name="clientId" value="<?= $fetch['clientId']; ?>"><br/>
		
        <hr/>
            <?php  }   ?>
       
            <button type="submit" name="del" value="" >Delete</button>
        </form>
        <?php
         
         if (isset($_POST['del'])) {
             
                    
            $bdd->exec('DELETE  FROM bookings WHERE id BETWEEN '.$id_24.' AND  '.$id_25);
            echo "Record deleted successfully";
         }else{
             echo "pas suppression id";
         } 
         $bdd = null;
    
     ?>

        </div>
</body>
</html>