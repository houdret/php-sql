<?php

$bdd = new PDO('mysql:host=localhost;dbname=colyseum', 'root', '');

$resultat = $bdd->query('SELECT * FROM clients WHERE id BETWEEN 24 AND 25');
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
    
    <title>Suppression des clients 24  et 25</title>
</head>
<body>
    <div class="container">
    <a href="/php-sql/crud/index.php" class="text-decoration-none">Liste des données</a>
        
    <?php 
        while ($fetch = $resultat->fetch()) {
    ?>
        <form action="create_cl_24_25.php" method="post">
        
			<label for="id" >Numéro client : </label>
			<input type="number" name="id" value="<?= $fetch['id']; ?>"><br/>
		
			<label for="lastName" >Nom : </label>
			<input type="text" name="lastName" value="<?= $fetch['lastName']; ?>"><br/>
		
			<label for="firstName" >Prénom : </label>
			<input type="text" name="firstName" value="<?= $fetch['firstName']; ?>"><br/>
		
			<label for="birthDate" >Date de naissance : </label>
			<input type="date" name="birthDate" value="<?= $fetch['birthDate']; ?>"><br/>
		
			<label for="card" >Carte de fidélité : </label>
			<input name="card" type="checkbox" value="<?= $fetch['card']; ?>" ><br/>
		
			<label for="cardNumber" >Numéro de carte de fidélité : </label>
			<input type="number" name="cardNumber" value="<?= $fetch['cardNumber']; ?>" ><br/>
            <hr/>
            <?php  }   ?>
       
            <button type="submit" name="del" value="" >Delete</button>
        </form>

       
        

        <?php
         
            if (isset($_POST['del'])) {
                
                       
               $bdd->exec('DELETE  FROM clients WHERE id BETWEEN '.$id_24.' AND  '.$id_25);
               echo "Record deleted successfully";
            }else{
                echo "pas suppression id";
            } 
            $bdd = null;
       
        ?>
    </div>
</body>
</html>