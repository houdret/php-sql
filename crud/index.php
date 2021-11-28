<?php
    error_reporting(E_ALL ^ E_WARNING);
    $bdd = new PDO('mysql:host=localhost;dbname=colyseum', 'root', '');
                    
    $resultat = $bdd->query("SELECT * FROM clients");
    $resultat1 = $bdd->query("SELECT * FROM shows");
    $resultat2 = $bdd->query("SELECT * FROM clients LIMIT 20 ");
    $resultat3 = $bdd->query("SELECT * FROM clients WHERE card = 1 ");
    $resultat4 = $bdd->query("SELECT * FROM clients WHERE lastName LIKE 'M%' ORDER BY lastName ASC  ");
    $resultat5 = $bdd->query("SELECT * FROM shows ORDER BY title ASC");
    $resultat6 = $bdd->query("SELECT * FROM clients");
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Exercice sql Randonnée">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>CRUD1</title>
    </head>
    <body>
        <div class="container">
            <table class="table table-striped">
                <tr><td><a href="/php-sql/crud/update.php" class="text-decoration-none">Pour modifier un client</a></td>
                <td><a href="/php-sql/crud/update_spectacle.php" class="text-decoration-none">Pour modifier un shows</a></td>
                <td> <a href="/php-sql/crud/update_client_5.php" class="text-decoration-none">Pour modifier le client n° 5</a></td>
                <td> <a href="/php-sql/crud/create.php"class="text-decoration-none">Pour create un client</a></td>
                </tr><tr><td> <a href="/php-sql/crud/create_spectacle.php" class="text-decoration-none">Pour create un show</a></td>
                <td> <a href="/php-sql/crud/create_cl_24_25.php" class="text-decoration-none">Pour supprimer 2 clients</a></td>
                <td> <a href="/php-sql/crud/Delete_reservation.php" class="text-decoration-none">Pour supprimer 2 réservations</a></td>
                <td> <a href="/php-sql/crud/Delete_billets.php" class="text-decoration-none">Pour supprimer 2 billets</a></td>
                
            </tr>
            </table>
        
        
       
       
        <h1>Liste des clients</h1>
       
        <table class="table table-striped">
            <?php while ($donnees = $resultat->fetch())
                {
                    echo '<tr> <td>'.$donnees['lastName'].'</td><td>'.$donnees['firstName'].'</td><td>'.$donnees['birthDate'].'</td></tr>';
                } ?> 
        </table>
        <h1>Liste des Spectables</h1>
       
        <table class="table table-striped">
            <?php while ($donnees = $resultat1->fetch())
                {
                    echo '<tr> <td>'.$donnees['title'].'</td><td>'.$donnees['performer'].'</td><td>'.$donnees['date'].'</td></tr>';
                } ?> 
        </table>
        <h1>Liste des 20 premiers clients</h1>
       
        <table class="table table-striped">
            <?php while ($donnees = $resultat2->fetch())
                {
                    echo '<tr> <td>'.$donnees['lastName'].'</td><td>'.$donnees['firstName'].'</td><td>'.$donnees['birthDate'].'</td></tr>';
                } ?> 
        </table>
        <h1>Liste des clients avec carte de fidélité</h1>
       
        <table class="table table-striped">
            <?php while ($donnees = $resultat3->fetch())
                {
                    echo '<tr> <td>'.$donnees['lastName'].'</td><td>'.$donnees['firstName'].'</td><td>'.$donnees['birthDate'].'</td></tr>';
                } ?> 
        </table>
        <h1>Liste des clients dont le nom commence par "M"</h1>
       
        
            <?php while ($donnees = $resultat4->fetch())
                {
                    echo 'Nom : '.$donnees['lastName'].'<br/> Prénom : '.$donnees['firstName'].'<br/>';
                } ?> 
        <h1>Liste des Spectables trier par ordre alphabètique</h1>
       
       <table class="table table-striped">
           <?php while ($donnees = $resultat5->fetch())
               {
                   echo '<tr> <td>'.$donnees['title'].'</td><td>'.$donnees['performer'].'</td><td>'.$donnees['date'].'</td><td>'.$donnees['startTime'].'</td></tr>';
               } ?> 
       </table>
       <h1>Liste des clients personnalisé</h1>
       
        
            <?php while ($donnees = $resultat6->fetch())
                {
                    echo 'Nom : '.$donnees['lastName'].'<br/> Prénom : '.$donnees['firstName'].'<br/>';
                    echo 'Date de naissance : '.$donnees['birthDate'].'<br/>';
                    if ($donnees['card'] == '' ) {
                       echo 'Carte de fidélité : Non <br/>';
                    }elseif ( $donnees['card'] == 0) {
                        echo 'Carte de fidélité : Non <br/>';
                    }else{
                        echo 'Carte de fidélité : Oui <br/>';
                    }
                    echo 'Numéro de carte : '.$donnees['cardNumber'].'<br/>';
                } ?> 

            
        </div>
    </body>
</html>
<?php

$resultat->closeCursor();
?>
