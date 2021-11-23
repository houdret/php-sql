<?php

error_reporting(E_ALL ^ E_WARNING);
$bdd = new PDO('mysql:host=localhost;dbname=weatherapp', 'root', '');
                
$resultat = $bdd->query("SELECT * FROM meteo");

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Exercice sql Météo">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Météo</title>
    </head>
    <body>
        <div class="container">
            <h1>Température pour chaque ville haute et basse !</h1>
       
        <table class="table table-striped">
            <?php while ($donnees = $resultat->fetch())
                {
                    echo '<tr> <td>'.$donnees['ville'].'</td><td>'.$donnees['haut'].'</td><td>'.$donnees['bas'].'</td></tr>';
                } ?> 
        </table>
        <form action="" method="post" class=" was-validated row g-1 ">
            <label for="ville" class="form-label">Ville </label> 
            <input type="text" name="ville" class="form-control is-valid" required><br/>            
            <label for="haut" class="form-label">Haut </label> 
            <input type="text" name="haut" class="form-control is-valid" required><br/> 
            <label for="bas" class="form-label">Bas </label> 
            <input type="text" name="bas" class="form-control is-valid" required><br/>  
            <div class="input-group mb-3">                
                <?php
                    $resultat = $bdd->query("SELECT * FROM meteo");
                    
                    while ($donnees =  $resultat->fetch())
                    {                       
                        echo '<div class="input-group-text"><input type="checkbox" name="checked[]" value=" '.$donnees['id'].'">'.$donnees['ville'].'</div>';
                        
                    } ?>
            </div>           
            <div class="col-12">
                <button type="submit" name="submit" class="btn btn-primary mb-3">Enregistrer</button>
            </div>                      
        </form>
        <?php
        if (isset($_POST['submit'])) {
            $errors = array();      
            $ville = filter_var($_POST['ville'], FILTER_SANITIZE_STRING);
            $haut  = filter_var($_POST['haut'], FILTER_SANITIZE_STRING);
            $bas = filter_var($_POST['bas'], FILTER_SANITIZE_STRING);
            
            if (false === filter_var($ville, FILTER_SANITIZE_STRING)) {
                $errors['ville'] = '<div class="alert alert-danger" role="alert">la ville est invalide.</div>';
            } else {
                echo '<div class="alert alert-success" role="alert">la ville est considérée comme valide.</div>';
            }
            if (false === filter_var($haut, FILTER_SANITIZE_STRING)) {
                $errors['haut'] = '<div class="alert alert-danger" role="alert">la température haute est invalide.</div>';
            } else {
                echo '<div class="alert alert-success" role="alert">la température haute est bien nettoyé et est considérée comme valide.</div>';
            }
            if (false === filter_var($gender, FILTER_SANITIZE_STRING)) {
                $errors['bas'] = '<div class="alert alert-danger" role="alert">la température basse  est invalide.</div>';
            } else {
                echo '<div class="alert alert-success" role="alert">la température basse est bien nettoyé et est considérée comme valide.</div>';                
            }

            $data = [
                'ville' => $_POST['ville'],
                'haut' => $_POST['haut'],
                'bas' => ($_POST['bas']),                
            ];
            
            if (!empty($_POST['checked'])) { 
                $donnee =  $_POST['checked'];
                var_dump($donnee);
                $del = 'DELETE FROM meteo WHERE id = ?';
                $bdd->prepare($del)->execute($donnee);  
            }
            try
            {
                $insertion =
                'INSERT INTO meteo (ville, haut, bas ) VALUES (:ville,:haut,:bas)';
                $bdd->prepare($insertion)->execute($data);
                
                if ($bdd == true) {
                    echo '<div class="alert alert-success" role="alert">les données ont bien été enregistrées! </div>';
                } 
            }
            catch(Exception $e)
            {
                die('Erreur : '.$e->getMessage());
            }          
        }
        ?>
        </div>
    </body>
</html>
<?php

$resultat->closeCursor();
?>
