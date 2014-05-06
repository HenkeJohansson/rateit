<?php


// Start of XML-file, create the parent node

$dom = new DOMDocument('1.0');
$node = $dom->createElement('markers');
$parnode = $dom->appendChild($node);

// Opens a connection to the database
require ('includes/connect.inc.php');

// Select all the rows in the Place table

$sql= "SELECT * FROM Places";
$result = $pdo->query($sql);

header('Content-type: text/xml');

// Looping through the rows, adding XML nodes for each

foreach ($result as $row) {
	// Add to XML document node
	$node = $dom->createElement('marker');
	$newnode = $parnode->appendChild($node);
	$newnode->setAttribute('placeName',$row['placeName']);
	$newnode->setAttribute('address',$row['address']);
	$newnode->setAttribute('lat', $row['lat']);
	$newnode->setAttribute('lng', $row['lng']);
	$newnode->setAttribute('description', $row['description']);
	$newnode->setAttribute('rating', $row['rating']);
	$newnode->setAttribute('type', $row['type']);
    
}

echo $dom->saveXML();