<?php

error_reporting(E_ALL ^ E_WARNING);
$bdd = new PDO('mysql:host=localhost;dbname=becode', 'root', '');
                
$resultat = $bdd->query("SELECT * FROM hiking");

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Exercice sql Randonnée">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Randonnée</title>
    </head>
    <body>
        <div class="container">
        <h1>Liste des randonnées</h1>
       
        <table class="table table-striped">
            <?php while ($donnees = $resultat->fetch())
                {
                    echo '<tr> <td><a href="update.php" id="'.$donnees['id'].'">'.$donnees['name'].'</a></td><td>'.$donnees['difficulté'].'</td><td>'.$donnees['distanceas'].'</td>
                    <td>'.$donnees['duration'].'</td><td>'.$donnees['height_difference'].'<a href="delete.php"><button type="submit" name="del" id="'.$donnees['id'].'" class="btn btn-danger ms-3">Delete</button></a></td></tr>';
                } ?> 
        </table>
        
        </div>
    </body>
</html>
<?php

$resultat->closeCursor();
?>
