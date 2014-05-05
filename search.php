<?php
//sök-sidan


//upprätta kontakt med databas
include $_SERVER['DOCUMENT_ROOT'].'/rateit/php/includes/connect.inc.php'; ?>

<?php include "php/header.php"; ?>

    <div id="container">
        <h3>Sök platser</h3>
            <div class="bit-3">
                <form method="post" id="searchbox" action="search.php">
                    <input id="search" type="text" name="searchtext" placeholder="Sök...">
                    <input id="submit" type="submit" value="Sök">
                </form>

<?php

if (isset($_POST['searchtext'])) {
				$search = $_POST['searchtext'];
				
				$sql_searchPlace = "SELECT * FROM places WHERE places.placeName LIKE '%$search%'";
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
						
						echo "<h3>";
						echo $placeName;
						echo "</h3>";
                        echo "<p><b>Betyg: </b>";
                        echo $rating . "</p>";
                        echo "</br>";
						echo "<p><b>Info: </b> ";
						echo $description . "</p>";
						echo "</br>";
                        echo "<p><b>Typ: </b>";
                        echo $type . "</p>";
                        echo "</br>";
                        echo "<p><b>Adress: </b>";
						echo $address . "</p>";
						echo "</br>";
					
                        
                        echo "<form action ='search.php' method='post'>";
                        echo '<h3>Betygsätt</h3>';
                        echo "<p>1 <input type='radio' name='rate' value='1'>";
                        echo "2 <input type='radio' name='rate' value='2'>";
                        echo "3 <input type='radio' name='rate' value='3'>";            
                        echo "4 <input type='radio' name='rate' value='4'>";
                        echo "5 <input type='radio' name='rate' value='5'><br/></p>";
                
                        echo "<input type='submit' name'submit' id='submit2' value='Rateit!'>";
                        echo "</form>";
                                        
   
					}
                    
                    
                }

                    
                    if (isset($_POST['submit'])){
                     
                        if(!empty($_POST['rate'])){ /*hämta knappens värde*/
						
							$rating = $_POST['rate'];
						
						}    
						    else{
                                echo "Du betygsatte aldrig";
                            }
                        
                        
                        $sql_ratePlace = "INSERT INTO places(rating)VALUES('$rating')";
						$result=$pdo->exec($sql_ratePlace);
				
				
                    }
        
        
        
?>

                

        </div><!--.bit-3-->
    </div><!--#container-->






	<script src="js/main.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
  	<script src="js/map.js"></script>

</body>
</html>