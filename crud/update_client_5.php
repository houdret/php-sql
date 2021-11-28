<?php
$bdd = new PDO('mysql:host=localhost;dbname=colyseum', 'root', '');

$resultat = $bdd->query('SELECT * FROM clients WHERE id = 5');
$id = 5;    

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Update client n° 5</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            
    </head>
    <body>
        <div class="container">
        <a href="/php-sql/crud/index.php" class="text-decoration-none">Liste des données</a>
        <h1>Update client n° 5</h1>
        <?php while ($fetch = $resultat->fetch()) {
           
         ?>
        <form action="" method="post" class=" was-validated row g-1 ">
            <div>
            <label for="lastName" class="form-label">LastName</label>
                <input type="text" name="lastName" value="<?= $fetch['lastName']; ?>" class="form-control is-valid" required>
            </div>
            <div>
                <label for="firstName" class="form-label">FirstName</label>
                <input type="text" name="firstName" value="<?= $fetch['firstName']; ?>" class="form-control is-valid" required>
            </div>
            <div>
                <label for="birthDate" class="form-label">BirthDate</label>
                <input type="date" name="birthDate" value="<?= $fetch['birthDate']; ?>" class="form-control is-valid" required>
            </div>

            <div>
                <label for="card" class="form-label">Card</label>
                <input type="number" name="card" value="<?= $fetch['card']; ?>" class="form-control " >
            </div>
            <div>
                <label for="cardNumber" class="form-label">CardNumber</label>
                <input type="number" name="cardNumber" value="<?= $fetch['cardNumber']; ?>" class="form-control " >
            </div>
            <button type="submit" name="button" class="btn btn-primary mb-3">Envoyer</button>
        </form>
        <?php
        }
        if (isset($_POST['button'])) {
            $errors = array();      
            $lastName = filter_var($_POST['lastName'], FILTER_SANITIZE_STRING);
            $firstName = filter_var($_POST['firstName'], FILTER_SANITIZE_STRING);
            $birthDate  = $_POST['birthDate'];
            $card = filter_var($_POST['card'], FILTER_SANITIZE_NUMBER_INT);
            $cardNumber = filter_var($_POST['cardNumber'], FILTER_SANITIZE_NUMBER_INT);
            


            if (false === filter_var($lastName, FILTER_SANITIZE_STRING)) {
                $errors['lastName'] = '<div class="alert alert-danger" role="alert">le nom est invalide.</div>';
            } else {
                echo '<div class="alert alert-success" role="alert">le nom est considérée comme valide.</div>';
            }
            if (false === filter_var($firstName, FILTER_SANITIZE_STRING)) {
                $errors['firstName'] = '<div class="alert alert-danger" role="alert">le prénom est invalide.</div>';
            } else {
                echo '<div class="alert alert-success" role="alert">le prénom  est bien nettoyé et est considérée comme valide.</div>';
            }
            if (false === filter_var($card, FILTER_SANITIZE_NUMBER_INT)) {
                $errors['card'] = '<div class="alert alert-danger" role="alert">la carte  est invalide.</div>';
            } else {
                echo '<div class="alert alert-success" role="alert">la carte est bien nettoyé et est considérée comme valide.</div>';                
            }
            if (false === filter_var($cardNumber, FILTER_SANITIZE_NUMBER_INT)) {
                $errors['cardNumber'] = '<div class="alert alert-danger" role="alert">le cardNumber  est invalide.</div>';
            } else {
                echo '<div class="alert alert-success" role="alert">le  cardNumber est bien nettoyé et est considérée comme valide.</div>';                
            }

            $data = [
                'id' =>$id,
                'lastName' => $_POST['lastName'],                
                'firstName' => $_POST['firstName'],
                'birthDate' => ($_POST['birthDate']), 
                'card' => $_POST['card'],
                'cardNumber' => ($_POST['cardNumber']),               
            ];
                try
                {
                    
                   
                    $update =$bdd->prepare('UPDATE clients SET lastName=:lastName, firstName=:firstName, birthDate=:birthDate, card=:card, cardNumber=:cardNumber WHERE id=:id ');
                   
                    $update->execute($data);
                    
                    if ($bdd == true) {
                        echo '<div class="alert alert-success" role="alert">les données ont bien été uploader! </div>';
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
