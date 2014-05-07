<?php
//sök-sidan


//upprätta kontakt med databas
include $_SERVER['DOCUMENT_ROOT'].'/rateit/php/includes/connect.inc.php'; ?>
<?php include "php/header.php"; ?>
    <div id="container">
        <div class="bit-3">
                <form method="post" id="addbox" action="add.php">
                     <h3>Föreslå en plats</h3>
                        <p>Känner ni att vi har glömt en plats? Föreslå den gärna till oss då!</p>
                    <br/>
                    <p>Platsens namn</p>
                        <input type="text" id="insertText" name="placeName">
                    <p>Beskrivning</p>
                        <textarea name="info" rows="5" cols="25" id="insertText"> </textarea>
                    <p>Adress</p>
                        <input type="text" id="insertText" name="address">
                    <p>Typ <i>(Restaurang, pub etc.)</i></p>
                        <input type="text" id="insertText" name="Typ"> <!--select -> option istället?-->
                    <p>Betyg (1-5)</p>
                        <input type="rating" id="insertText" name="rating"> <!--select -> option istället?-->
                    </br>
                    <input type="submit" id="submitAdd" value="Skicka">
                </form>
    
        </div><!--.bit-3-->
    </div><!--#container-->

	<script src="js/main.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
  	<script src="js/map.js"></script>


</body>
</html>