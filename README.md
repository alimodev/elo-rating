# Elo Rating System

##### PHP implementation of the rating algorithm that was used in [Facemash](https://en.wikipedia.org/wiki/History_of_Facebook#FaceMash) by Mark Zuckerberg.
#
It's based on the [Elo Rating System](https://en.wikipedia.org/wiki/Elo_rating_system#Mathematical_details) , usually used for calculating the relative skill levels of players in zero-sum games such as chess.

The initial rating of each player in Facemash was 1400, yet we don't know the K-factor of the game. (Info based on the [Social Network](https://en.wikipedia.org/wiki/The_Social_Network) Movie!)

## Getting Started
To get started, see the examples in index.php. All you have to do is to create an instance of the class and start using it!

```PHP
require('../src/EloRating.php');
$elo = new Alimodev\EloRating();
```
## Setting the K-Factor Coefficient
If the K-factor coefficient is set too large, there will be too much sensitivity to just a few, recent events, in terms of a large number of points exchanged in each game. And if the K-value is too low, the sensitivity will be minimal, and the system will not respond quickly enough to changes in a player's actual level of performance.

Elo's original K-factor estimation was made without the benefit of huge databases and statistical evidence. A K-factor of 24 (for players rated above 2400) may be more accurate both as a predictive tool of future performance, and also more sensitive to performance.
```PHP
$elo->setFactor(24);
```
## Adding Players
```PHP
$elo->addPlayer("Gary");
$elo->addPlayer("Alireza");
```

## Printing Players
Can be done any time in the game, after defining player, voting..
This prints the players and their ratings.
```PHP
$elo->printPlayers();
```

##  Voting the Winner Between 2 players
Each voting recalculates the ratings of the players.
```PHP
$elo->vote("Gary", "Alireza", "Alireza");
// Alireza Wins This match
```

## Going Further
This class has other useful public methods. You can explore them in the class itself!

## Authors
* **Alireza Mortazavi**
