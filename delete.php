<?php
$bdd = new PDO('mysql:host=localhost;dbname=becode', 'root', '');
//$resultat = $bdd->query("SELECT * FROM hiking");

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
        <a href="/php-sql/read.php">Liste des données</a>
        <h1>Supprimer</h1>
        <?php
            
            if (isset($_POST['id'])) {
                $id = $_POST['id'];
                
               $bdd->exec('DELETE  FROM hiking WHERE id = '.$id);
               echo "Record deleted successfully";
            }else{
                echo "pas d'envois id";
            } 
            $bdd = null;
        ?>
</div>
</body>
</html>