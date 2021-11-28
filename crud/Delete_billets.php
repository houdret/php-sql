<?php
$bdd = new PDO('mysql:host=localhost;dbname=colyseum', 'root', '');

$resultat = $bdd->query('SELECT * FROM tickets WHERE bookingsId BETWEEN 24 AND 25');
$id_25 = 25;  
$id_24 = 24;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <title>Supression des billets 24 et 25</title>
</head>
<body>
<div class="container">
    <a href="/php-sql/crud/index.php" class="text-decoration-none">Liste des données</a>
        
    <?php 
        while ($fetch = $resultat->fetch()) {
    ?>
    <form action="Delete_billets.php" method="post">
            <label for="id" >Numéro billets : </label>
			<input type="number" name="id" value="<?= $fetch['id']; ?>"><br/>
		
			<label for="price" >Prix : </label>
			<input type="number" name="price" value="<?= $fetch['price']; ?>"><br/>
            
            <label for="bookingsId" >Numéro réservation : </label>
			<input type="number" name="bookingsId" value="<?= $fetch['bookingsId']; ?>"><br/>
        <hr/>
            <?php  }   ?>
       
            <button type="submit" name="del" value="" >Delete</button>
        </form>
        <?php
         
         if (isset($_POST['del'])) {
             
                    
            $bdd->exec('DELETE  FROM tickets WHERE bookingsId BETWEEN '.$id_24.' AND  '.$id_25);
            echo "Record deleted successfully";
         }else{
             echo "pas suppression id";
         } 
         $bdd = null;
    
     ?>
</body>
</html>