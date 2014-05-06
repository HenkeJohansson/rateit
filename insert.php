<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Insert</title>
</head>
<body>
	<form action="insert.php" method="post">
		<input type="text" name="placeName"> placeName <br>
		<input type="text" name="address"> address <br>
		<input type="text" name="lat"> lat <br>
		<input type="text" name="lng"> lng <br>
		<input type="text" name="description"> description <br>
		<select name="rateing"> rating
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
		</select>
		<select name="type">
			<option value="bar">Bar</option>
			<option value="resturant">Resturang</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
		</select>
		<input type="submit" value="Submit">
	</form>

	<?php 
		// Njahaha
		require 'php/includes/connect.inc.php';

		if (isset($_POST['placeName'])) {
			$placeName=htmlspecialchars($_POST['placeName'],ENT_QUOTES);
			$address=htmlspecialchars($_POST['address'],ENT_QUOTES);
			$lat=htmlspecialchars($_POST['lat'],ENT_QUOTES);
			$lng=htmlspecialchars($_POST['lng'],ENT_QUOTES);


			$sql="INSERT INTO Places (placeName,address,lat,lng,description,type)
			VALUES (?,?,?,?,?,?)";

			try {
				$statement=$pdo->prepare($sql);
				$statement->execute(array($placeName,$address,$lat,$lng,$description,$type));
			} catch (PDOExeption $e) {
				echo "Dä funk int nuh!";
			}
		}
	?>

</body>
</html>