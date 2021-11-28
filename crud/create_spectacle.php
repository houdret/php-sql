<?php

$bdd = new PDO('mysql:host=localhost;dbname=colyseum', 'root', '');

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajouter une randonnée</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        
</head>
<body>
    <div class="container">
    <a href="index.php" class="text-decoration-none">Liste des données</a>
	<h1>Ajouter</h1>
	<form action="" method="post" class=" was-validated row g-1 ">
		<div>
			<label for="title" class="form-label">Title</label>
			<input type="text" name="title" value="" class="form-control is-valid" required>
		</div>

		<div>
			<label for="performer" class="form-label">Performer</label>
			<input type="text" name="performer" value="" class="form-control is-valid" required>
		</div>

		<div>
			<label for="date" class="form-label">Date</label>
			<input type="date" name="date" value="" class="form-control is-valid" required>
		</div>
		<div>
			<label for="showTypesId" class="form-label">ShowTypeId</label>
			<input type="number" name="showTypesId" value="" class="form-control is-valid" required>
		</div>
		<div>
			<label for="firstGenresId" class="form-label">FirstGenreId</label>
			<input type="number" name="firstGenresId" value="" class="form-control is-valid" required>
		</div>
        <div>
			<label for="secondGenreId" class="form-label">SecondGenreId</label>
			<input type="number" name="secondGenreId" value="" class="form-control is-valid" required>
		</div>
        <div>
			<label for="duration" class="form-label">Duration</label>
			<input type="time" name="duration" value="" class="form-control is-valid" required>
		</div>
        <div>
			<label for="startTime" class="form-label">StartTime</label>
			<input type="time" name="startTime" value="" class="form-control is-valid" required >
		</div>
		<button type="submit" name="submit" class="btn btn-primary mb-3">Envoyer</button>
	</form>
    <?php
    if (isset($_POST['submit'])) {
            $errors = array();      
            $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
            $performer = filter_var($_POST['performer'], FILTER_SANITIZE_STRING);
            $date  = $_POST['date'];
            $showTypesId = filter_var($_POST['showTypesId'], FILTER_SANITIZE_NUMBER_INT);
            $firstGenresId = filter_var($_POST['firstGenresId'], FILTER_SANITIZE_NUMBER_INT);
            $secondGenreId = filter_var($_POST['secondGenreId'], FILTER_SANITIZE_NUMBER_INT);
            $duration = $_POST['duration'];
            $startTime = $_POST['startTime'];

            if (false === filter_var($title, FILTER_SANITIZE_STRING)) {
                $errors['title'] = '<div class="alert alert-danger" role="alert">le titre est invalide.</div>';
            } else {
                echo '<div class="alert alert-success" role="alert">le titre est considérée comme valide.</div>';
            }
            if (false === filter_var($performer, FILTER_SANITIZE_STRING)) {
                $errors['performer'] = '<div class="alert alert-danger" role="alert">le performer est invalide.</div>';
            } else {
                echo '<div class="alert alert-success" role="alert">le performer  est bien nettoyé et est considérée comme valide.</div>';
            }
            if (false === filter_var($showTypesId, FILTER_SANITIZE_NUMBER_INT)) {
                $errors['showTypesId'] = '<div class="alert alert-danger" role="alert">le showTypesId  est invalide.</div>';
            } else {
                echo '<div class="alert alert-success" role="alert">le showTypesId est bien nettoyé et est considérée comme valide.</div>';                
            }
            if (false === filter_var($firstGenresId, FILTER_SANITIZE_NUMBER_INT)) {
                $errors['firstGenresId'] = '<div class="alert alert-danger" role="alert">le firstGenresId  est invalide.</div>';
            } else {
                echo '<div class="alert alert-success" role="alert">le  firstGenresId est bien nettoyé et est considérée comme valide.</div>';                
            }
            if (false === filter_var($secondGenreId, FILTER_SANITIZE_NUMBER_INT)) {
                $errors['secondGenreId'] = '<div class="alert alert-danger" role="alert">le secondGenreId  est invalide.</div>';
            } else {
                echo '<div class="alert alert-success" role="alert">le  secondGenreId est bien nettoyé et est considérée comme valide.</div>';                
            }
            $data = [
                'title' => $_POST['title'],                
                'performer' => $_POST['performer'],
                'date' => ($_POST['date']), 
                'showTypesId' => $_POST['showTypesId'],
                'firstGenresId' => ($_POST['firstGenresId']), 
                'secondGenreId' => ($_POST['secondGenreId']), 
                'duration' => $_POST['duration'],
                'startTime' => ($_POST['startTime']),                  
            ];
            
            
            try
            {               
                
                $insertion =
                'INSERT INTO shows (title, performer, date, showTypesId, firstGenresId,secondGenreId, duration,startTime ) VALUES (:title,:performer,:date,:showTypesId,:firstGenresId,:secondGenreId,:duration,:startTime)';
                
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