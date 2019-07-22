<?php

require('elo.php');

$elo = new EloRating();
$elo->setFactor(24);

$elo->addPlayer("Gary");
$elo->addPlayer("Alireza");
$elo->addPlayer("Reza");
$elo->addPlayer("Mahmoud");
$elo->addPlayer("Iman");

$elo->printPlayers();

echo "<br />";

$elo->vote("Gary", "Alireza", "Alireza");
$elo->vote("Reza", "Alireza", "Alireza");
$elo->vote("Mahmoud", "Alireza", "Mahmoud");
$elo->vote("Reza", "Iman", "Reza");
$elo->vote("Gary", "Mahmoud", "Gary");


echo "<br />";

$elo->printPlayers();

?>

<br /><hr />
<a href="index.php">Go Back..</a>
