<?php

/**
 * Elo Rating Class
 * more info on wikipedia
 * https://en.wikipedia.org/wiki/Elo_rating_system#Mathematical_details
 * Implementation by Alireza Mortazavi
 */
namespace Alimodev;

class EloRating
{
  /**
   * Objects Declaration
   */
  private $kFactor = 1;
  private $initialRating = 1400;
  private $players = array();

  /**
   * Set K Factor
   */
  public function setFactor($newVal)
  {
    if (is_numeric($newVal))
    {
      $this->kFactor = $newVal;
    }
  }

  /**
   * Get K Factor
   */
  public function getFactor()
  {
    return $this->kFactor;
  }

  /**
   * Add new Player
   */
  public function addPlayer($playerName, $initialRating = '')
  {
    if (!$this->playerExists($playerName))
    {
      if (empty($initialRating))
      {
        $initialRating = $this->initialRating;
      }
      $this->players[$playerName] = $initialRating;
      return true;
    }
    return false;
  }

  /**
   * Remove a player
   */
  public function removePlayer($playerName)
  {
    if ($this->playerExists($playerName))
    {
      unset($this->players[$playerName]);
      return true;
    }
    return false;
  }

  /**
   * Get All Players and their ratings
   */
  public function getPlayers()
  {
    return $this->players;
  }

  /**
   * print all players and their scores
   */
  public function printPlayers()
  {
    foreach ($this->getPlayers() as $playerName => $playerRating)
    {
      echo '[' . $playerName . ']: ' . $playerRating . "<br />";
    }
  }

  /**
   * check player exists
   */
  public function playerExists($playerName)
  {
    if (in_array($playerName, array_keys($this->players)))
    {
      return true;
    }
    return false;
  }

  /**
   * get a player's rating
   */
  public function getRating($playerName)
  {
    if ($this->playerExists($playerName))
    {
      return $this->players[$playerName];
    }
    return false;
  }

  /**
   * set a player's rating
   */
  public function setRating($playerName, $playerRating)
  {
    if ($this->playerExists($playerName))
    {
      $this->players[$playerName] = $playerRating;
      return true;
    }
    return false;
  }

  /**
   * get a player's expectation
   */
  public function getExpectation($ratingA, $ratingB)
  {
    $calc = (1.0 / (1.0 + pow(10, (($ratingA - $ratingB) / 400))));
    return $calc;
  }

  /**
   * Calc rating based on the current rating, expectation and winning status
   */
  public function calcRating($rating, $expected, $actual)
  {
    $calc = ($rating + $this->getFactor() * ($actual - $expected));
    return $calc;
  }

  /**
   * Vote
   * updates the rating of each player based on the winner
   */
  public function vote($playerA, $playerB, $winner)
  {
    // check players both exists and the winner is among them
    if (
      $this->playerExists($playerA) &&
      $this->playerExists($playerB) &&
      ($winner == $playerA || $winner == $playerB)
    )
    {
      // get current rating of each player
      $currentRatingA = $this->getRating($playerA);
      $currentRatingB = $this->getRating($playerB);
      // get expectations of each player
      $expectationPlayerA = $this->getExpectation(
        $currentRatingB,
        $currentRatingA
      );
      $expectationPlayerB = $this->getExpectation(
        $currentRatingA,
        $currentRatingB
      );
      // set win status of each player based on winner
      $winStatusPlayerA = 0;
      if ($winner == $playerA)
      {
        $winStatusPlayerA = 1;
      }
      $winStatusPlayerB = 0;
      if ($winner == $playerB)
      {
        $winStatusPlayerB = 1;
      }
      // calc each player rating and set it
      $newRatingA = $this->calcRating(
        $currentRatingA,
        $expectationPlayerA,
        $winStatusPlayerA
      );
      $this->setRating($playerA, $newRatingA);
      $newRatingB = $this->calcRating(
        $currentRatingB,
        $expectationPlayerB,
        $winStatusPlayerB
      );
      $this->setRating($playerB, $newRatingB);
      // return true as a success sign
      return true;
    }
    // player or winner is not found
    return false;
  }

}

?>
