<?php
//sök-sidan


//upprätta kontakt med databas
include $_SERVER['DOCUMENT_ROOT'].'/rateit/php/includes/connect.inc.php'; ?>
<?php include "php/header.php"; ?>
    <div id="container">
        
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
                        <input type="text" id="insertText" name="Type"> <!--select -> option istället?-->
                    <p>Betyg (1-5)</p>
                        <input type="rating" id="insertText" name="rating"> <!--select -> option istället?-->
                    </br>
                    <input type="submit" id="submitAdd" value="Skicka">
                </form>
    
        
    </div><!--#container-->
                   <?php
                
                    if (isset($_POST['place_name'])){
                    
                        //hämta data från formulär
                        $place_name = htmlspecialchars($_POST['place_name'],ENT_QUOTES);
                        $description = htmlspecialchars($_POST['description'],ENT_QUOTES);
                        $address = htmlspecialchars($_POST['address'],ENT_QUOTES);
                        $type = htmlspecialchars($_POST['type'],ENT_QUOTES);
                        $rating = htmlspecialchars($_POST['rating'],ENT,QUOTES);
                        
                        //lägger in data i databasen
                        $sql = "INSERT INTO suggest_places (place_name, description, address, type, rating) VALUES (?,?,?,?,?)";
                        
                        try {
                            $statement=$pdo->prepare($sql);
                            $statement->execute(array($place_name, $description, $address, $type, $rating));
                        } catch (PDOExeption $e) {
                            echo "Det funkar ej!";
                        }
                    }
                                
                    
               ?>
 

	<script src="js/main.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
  	<script src="js/map.js"></script>


</body>
</html>