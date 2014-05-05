<?php
//om-sidan


//upprätta kontakt med databas
include $_SERVER['DOCUMENT_ROOT'].'/rateit/php/includes/connect.inc.php'; ?>

<?php include "php/header.php"; ?>

    <div id="container">
        <h3>Om</h3>
        
       <div class="bit-3"> 
           <p>Malmö stad har landets största högskola med 25 000 studenter från hela världen per år. RateIt är en webbapplikation som hjälper Malmö högskolas studenter att på ett enkelt och effektivt tillvägagångssätt recensera och betygsätta Malmös nöjesliv.</p>
           <br/>

           <p>Via geotagging får användaren upp ett omfattande utbud på restauranger och barer i sin närhet. Genom recenssioner och betygssättning kan användaren med hjälp av RateIt-applikationen finna den 
restaurang och bar som passar för just det rätta tillfället. Detta hjälper även andra nyfikna studenter att hitta dit.</p>
        
        
        </div><!--.bit-3-->
    </div><!--#container-->






	<script src="js/main.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
  	<script src="js/map.js"></script>

</body>
</html>