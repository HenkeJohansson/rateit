<?php
//sök-sidan


//upprätta kontakt med databas
include 'php/includes/connect.inc.php'; ?>

<?php include "php/header.php"; ?>
<div id="map-container"><div id="map" style="height:100%"></div></div>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
	<script src="js/getPlaces.js"></script>
	<script src="js/main.js"></script>

    <div id="container" class='group'>
            
                <form method="post" id="searchbox" action="search.php">
                    <h3>Sök platser</h3>
                    <input id="search" type="text" name="searchtext" placeholder="⌕ Sök...">
                    <input id="submit" type="submit" value="Sök">
                </form>

<?php
        echo "<div id='searchContent1' class='group'>";

            if (isset($_POST['searchtext'])) {
				$search = $_POST['searchtext'];
                
            if ($search == ""){
                echo "<div id='searchContent'>";
                echo "<p>Ange söktext</p>";
                echo "</div>";
                exit();
            }
                        echo "<div id='searchContent1'>"; 
        echo "<div id='clearfix'></div>";
				
				$sql_searchPlace = "SELECT * FROM Places WHERE Places.placeName LIKE '%$search%'";
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
                        $opening_hours = $row['opening_hours'];
                        $star = $row['star'];
						
                        echo "<div id='searchContent'>";
                        echo "<h4> Sökord: <i> $search</i> </h4><br>";
						echo "<h3>";
						echo $placeName;
						echo "</h3>";
                        echo "<p><b>Betyg: </b>";
                        echo $rating . " " . $star . "</p>";
                        echo "</br>";
                        echo "<img src='$pic'>";
                        echo "</br>";
						echo "<p><b>Info: </b> ";
						echo $description . "</p>";
                        echo "</br>";
                        echo "<p><b>Adress: </b>";
						echo $address . "</p>";
						echo "</br>";
                        echo "<p> <b>Öppettider: </b>";
                        echo $opening_hours . "</p>";
                        echo "</br>";
                        echo "<p><b>Typ: </b>";
                        echo $type . "</p>";
					    
                        
                        echo "<form action ='search.php' method='post'>";
                        echo '<h3>Betygsätt</h3>';
                        echo "<p>1 <input type='radio' name='rate' value='1'>";
                        echo "2 <input type='radio' name='rate' value='2'>";
                        echo "3 <input type='radio' name='rate' value='3'>";            
                        echo "4 <input type='radio' name='rate' value='4'>";
                        echo "5 <input type='radio' name='rate' value='5'><br/></p>";
                
                        echo "<input type='submit' name'submit' id='submit2' value='Rateit!'>";
                        echo "</form>";
                        echo '</div>';
                        
   
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
        
        echo "</div>";//#searchContent1
        
?>

                
        </div><!--#container-->
        
    







</body>
</html>