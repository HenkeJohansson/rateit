<?php
//sök-sidan


//upprätta kontakt med databas
include $_SERVER['DOCUMENT_ROOT'].'/rateit/connect.php'; ?>

<?php include "php/header.php"; ?>

    <div id="container">
        <h3>Sök platser</h3>
            <form method="post" id="searchbox" action="search.php">
                <input id="search" type="text" name="searchtext" placeholder="Sök...">
                <input id="submit" type="submit" value="Sök">
            </form>

<?php

if (isset($_POST['searchtext'])) {
				$search = $_POST['searchtext'];
				
				$sql_searchPlace = "SELECT * FROM place ";
					$result_searchPlace=$pdo->query($sql_searchPlace);
					foreach( $result_searchPlace as $row){
						//hämta data från place-tabellen
						$placeName = $row['placeName'];
						$address = $row['address'];
						$description = $row ['description'];
						$rating = $row['rating'];
                        $type = $row['type'];
                        $lat = $row['lat'];
                        $lng = $row['lng'];
						
						echo "<h3>";
						echo $placeName;
						echo "</h3>";
                        echo $rating;
                        echo "</br>";
						echo "Info: ";
						echo $description;
						echo "</br>";
                        echo $type;
                        echo "</br>";
						echo $address;
						echo "</br>";
							
					}
				
				}

?>






    </div><!--#conainer-->






	<script src="js/main.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
  	<script src="js/map.js"></script>

</body>
</html>