# Dice Roller Game

## Description
This is a Dice App Application using Laravel 5.2 and AngularJs.

* 1. The game contains 4 players.
* 2. Each player will have 6 dice in their dice up.
* 3. Each round all players will roll their dice at the same time.
* 4. All dice with number 1 on top side will be passed to player on his right hand (the right most player
will pass the dice to left most player)
* 5. All dice with number 6 on top side will be removed from their dice cup.
* 6. All players roll their dice again to start next round.
* 7. The player who first emptied their dice cup (could be more than 1 player) is winner(s).

## Requirement
* [PHP](http://php.net/supported-versions.php) >= 5.5.9
* [Composer](https://getcomposer.org/)
* Apache 2+

## Installing
- Create a new project folder, eg: dice
- cd dice
- git clone https://github.com/flakesns/laradice.git
- Add virtual host in apache, eg: dice.com
- Edit your host file: add 127.0.0.1 dice.com
- Install dependencies
```
composer install
```


## Demo
[Demo](https://laradice.herokuapp.com/)

## Develop By
[Hafiz](http://hafiznor.herokuapp.com)




