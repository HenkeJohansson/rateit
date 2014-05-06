<?php
//sök-sidan


//upprätta kontakt med databas
include $_SERVER['DOCUMENT_ROOT'].'/rateit/php/includes/connect.inc.php'; ?>
<?php include "php/header.php"; ?>
    <div id="container">
        <h3>Föreslå en plats</h3>
            <p>Känner ni att vi har glömt en plats? Föreslå den gärna till oss då!</p>
            <br/>
            <form method="post" action="add.php">
                Platsens namn
                </br>
                <input type="text" name="placeName">
                </br>
                Beskrivning
                </br>
                <textarea name="info" rows="5" cols="25"> </textarea>
                </br>
                Adress
                </br>
                <input type="text" name="address">
                </br>
                Typ
                </br>
                <input type="text" name="Typ"> <!--select -> option istället?-->
                </br>
                Betyg
                </br>
                <input type="rating" name="rating">
                </br>
                <input type="submit" value="Skicka">
        
        
        
        
        
        
        
            </form>
    

    </div><!--#container-->

	<script src="js/main.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
  	<script src="js/map.js"></script>


</body>
</html>