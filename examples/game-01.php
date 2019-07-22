<?php

require('../src/EloRating.php');

// https://www.hackerearth.com/blog/developers/elo-rating-system-common-link-facemash-chess/

$elo = new Alimodev\EloRating();
$elo->setFactor(24);

echo "<h3>Simple 2 Player Chess</h3>";
echo "<h4>K-Factor: 24 (The Chess Federation decides that !)</h4>";
echo "<br />";

$elo->addPlayer("Gary Kasparov", 2500);
$elo->addPlayer("Alireza Mortazavi", 2200);

echo '<b>Initial players and their ratings: </b><br />';
$elo->printPlayers();

echo "<br />";

echo '<b>Alireza Wins: </b><br />';
$elo->vote("Gary Kasparov", "Alireza Mortazavi", "Alireza Mortazavi");


$elo->printPlayers();

?>

<br /><hr />
<a href="../index.php">Go Back..</a>
