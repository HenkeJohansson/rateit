<?php
//sök-sidan


//upprätta kontakt med databas
include $_SERVER['DOCUMENT_ROOT'].'/rateit/php/includes/connect.inc.php'; ?>
<?php include "php/header.php"; ?>
<div id="map-container"><div id="map" style="height:100%"></div></div>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
	<script src="js/getPlaces.js"></script>
	<script src="js/map2.js"></script>
	<script src="js/main.js"></script>
    <div id="container">
                <div id="places">
            
            <?php 
                    $sql_searchPlace = "SELECT * FROM places";
					$result_searchPlace=$pdo->query($sql_searchPlace);
					foreach( $result_searchPlace as $row){
						//hämta data från place-tabellen
						$id = $row['id'];
                        $placeName = $row['placeName'];
						$address = $row['address'];
						$description = $row ['description'];
						$rating = $row['rating'];
                        $type = $row['type'];
                        $lat = $row['lat'];
                        $lng = $row['lng'];
                        $pic = $row['pic'];
						$star = $row['star'];
                        
                        echo "<div id='searchResult'>";
						echo "<h4>";
						echo $placeName;
						echo "</h4>";
                        echo "<p><b>Betyg: </b>";
                        echo $rating . " " . $star .  "</p>";
                        echo "</br>";
                        echo "<img src='$pic'>";
                        echo "</div>";
                    
   
					}
                    
            ?>
            
            
        </div>
            <div id="form">
                <form method="post" id="addbox" action="add.php">
                     <h3>Föreslå en plats</h3>
                        <p>Känner ni att vi har glömt en plats? Föreslå den gärna till oss då!</p>
                    <br/>
                    <p>Platsens namn</p>
                        <input type="text" id="insertText" name="place_name">
                    <p>Beskrivning</p>
                        <textarea name="description" rows="5" cols="25" id="insertText"> </textarea>
                    <p>Adress</p>
                        <input type="text" id="insertText" name="address">
                    <p>Typ <i>(Restaurang, pub etc.)</i></p>
                        <input type="text" id="insertText" name="type"> <!--select -> option istället?-->
                    <p>Betyg (1-5)</p>
                        <input type="text" id="insertText" name="rating"> <!--select -> option istället?-->
                    </br>
                    <input type="submit" id="submitAdd" value="Skicka">
                </form>
    
        </div><!--#form-->


    </div><!--#container-->
                   <?php
                
                    if (isset($_POST['place_name'])){
                    
                        //hämta data från formulär
                        $place_name = htmlspecialchars($_POST['place_name'],ENT_QUOTES);
                        $description = htmlspecialchars($_POST['description'],ENT_QUOTES);
                        $address = htmlspecialchars($_POST['address'],ENT_QUOTES);
                        $type = htmlspecialchars($_POST['type'],ENT_QUOTES);
                        $rating = htmlspecialchars($_POST['rating'],ENT_QUOTES);
                        
                        //lägger in data i databasen
                        $sql = "INSERT INTO suggest_places (place_name, description, address, type, rating) VALUES (?,?,?,?,?)";
                        
                        try {
                            $statement=$pdo->prepare($sql);
                            $statement->execute(array($place_name, $description, $address, $type, $rating));
                            
                            echo "<p>Vi har tagit emot ditt förslag, tack!</p>";
                        } catch (PDOExeption $e) {
                            echo "Det funkar ej!";
                        }
                    }
                        
                    
               ?>
 




</body>
</html>