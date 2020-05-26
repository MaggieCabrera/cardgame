<?php 
include "autoload.php";
$game = new Game(5);
$my_deck = $game->get_deck();
$opponent_deck = $game->get_opponent_deck();
?>
