<?php

require('../src/EloRating.php');

$elo = new Alimodev\EloRating();

$kFactor = 100;
if (!empty($_POST['k']) && $_POST['k'] > 0)
{
  $kFactor = $_POST['k'];
}
$elo->setFactor($kFactor);

echo "<h3>MultiPlayer Chess with k-factor of $kFactor</h3>";
echo "<b>Initial players and their ratings:</b> <br />";

$elo->addPlayer("Gary");
$elo->addPlayer("Alireza");
$elo->addPlayer("Reza");
$elo->addPlayer("Mahmoud");
$elo->addPlayer("Iman");

$elo->printPlayers();

echo "<br /><b>Games:</b><br />";

$elo->vote("Gary", "Alireza", "Alireza");
echo "(Gary vs. Alireza) [Alireza Wins!] <br />";

$elo->vote("Reza", "Alireza", "Alireza");
echo "(Reza vs. Alireza) [Alireza Wins!] <br />";

$elo->vote("Mahmoud", "Alireza", "Mahmoud");
echo "(Mahmoud vs. Alireza) [Mahmoud Wins!] <br />";

$elo->vote("Reza", "Iman", "Reza");
echo "(Reza vs. Iman) [Reza Wins!] <br />";

$elo->vote("Gary", "Mahmoud", "Gary");
echo "(Gary vs. Mahmoud) [Gary Wins!] <br />";

echo "<br /><b>Ratings So far:</b><br />";

$elo->printPlayers();

?>
<hr />
<b>Change k-Factor:</b>
<form method="post" action="">
  <input type="text" name="k" value="<?= $kFactor ?>" />
  <input type="submit" value="Play Again" />
</form>
<hr />
<a href="../index.php">Go Back..</a>
