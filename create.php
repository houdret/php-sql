<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajouter une randonnée</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        
</head>
<body>
    <div class="container">
    <a href="/php-sql/read.php">Liste des données</a>
	<h1>Ajouter</h1>
	<form action="" method="post" class=" was-validated row g-1 ">
		<div>
			<label for="name" class="form-label">Name</label>
			<input type="text" name="name" value="" class="form-control is-valid" required>
		</div>

		<div>
			<label for="difficulty" class="form-label">Difficulté</label>
			<select name="difficulty" class="form-select">
				<option value="Très facile">Très facile</option>
				<option value="Facile">Facile</option>
				<option value="Moyen">Moyen</option>
				<option value="Difficile">Difficile</option>
				<option value="Très difficile">Très difficile</option>
			</select>
		</div>

		<div>
			<label for="distance" class="form-label">Distance</label>
			<input type="text" name="distance" value="" class="form-control is-valid" required>
		</div>
		<div>
			<label for="duration" class="form-label">Durée</label>
			<input type="time" name="duration" value="" class="form-control is-valid" required>
		</div>
		<div>
			<label for="height_difference" class="form-label">Dénivelé</label>
			<input type="text" name="height_difference" value="" class="form-control is-valid" required>
		</div>
		<button type="submit" name="button" class="btn btn-primary mb-3">Envoyer</button>
	</form>
    <?php
    error_reporting(E_ALL ^ E_WARNING);
    if (isset($_POST['button'])) {
            $errors = array();      
            $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
            $difficulty  = filter_var($_POST['difficulty'], FILTER_SANITIZE_STRING);
            $distance = filter_var($_POST['distance'], FILTER_SANITIZE_NUMBER_INT);
            $height_difference = filter_var($_POST['height_difference'], FILTER_SANITIZE_NUMBER_INT);
            $duration = $_POST['duration'];


            if (false === filter_var($name, FILTER_SANITIZE_STRING)) {
                $errors['name'] = '<div class="alert alert-danger" role="alert">le nom est invalide.</div>';
            } else {
                echo '<div class="alert alert-success" role="alert">le nom est considérée comme valide.</div>';
            }
            if (false === filter_var($difficulty, FILTER_SANITIZE_STRING)) {
                $errors['difficulty'] = '<div class="alert alert-danger" role="alert">la difficulty est invalide.</div>';
            } else {
                echo '<div class="alert alert-success" role="alert">la difficulty  est bien nettoyé et est considérée comme valide.</div>';
            }
            if (false === filter_var($distance, FILTER_SANITIZE_NUMBER_INT)) {
                $errors['distance'] = '<div class="alert alert-danger" role="alert">la distance  est invalide.</div>';
            } else {
                echo '<div class="alert alert-success" role="alert">la distance est bien nettoyé et est considérée comme valide.</div>';                
            }
            if (false === filter_var($height_difference, FILTER_SANITIZE_NUMBER_INT)) {
                $errors['height_difference'] = '<div class="alert alert-danger" role="alert">la height_difference  est invalide.</div>';
            } else {
                echo '<div class="alert alert-success" role="alert">la height_difference est bien nettoyé et est considérée comme valide.</div>';                
            }

            $data = [
                'name' => $_POST['name'],
                'difficulty' => $_POST['difficulty'],
                'distance' => ($_POST['distance']), 
                'duration' => $_POST['duration'],
                'height_difference' => ($_POST['height_difference']),               
            ];
            
            
            try
            {
                $bdd = new PDO('mysql:host=localhost;dbname=becode', 'root', '');
               
                $insertion =
                'INSERT INTO hiking (name, difficulty, distance, duration, height_difference ) VALUES (:name,:difficulty,:distance,:duration,:height_difference)';
              
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