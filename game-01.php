<?php

require('elo.php');

// https://www.hackerearth.com/blog/developers/elo-rating-system-common-link-facemash-chess/

$elo = new EloRating();
$elo->setFactor(24);

echo "<h4>Factor: 24 (The Chess Federation has decided that !)</h4>";
echo "<br />";

$elo->addPlayer("Gary Kasparov", 2500);
$elo->addPlayer("Alireza Mortazavi", 2200);

echo '<b>Initial Players: </b><br />';
$elo->printPlayers();

echo "<br />";

echo '<b>Mortazavi Wins: </b><br />';
$elo->vote("Gary Kasparov", "Alireza Mortazavi", "Alireza Mortazavi");


$elo->printPlayers();

?>

<br /><hr />
<a href="index.php">Go Back..</a>
