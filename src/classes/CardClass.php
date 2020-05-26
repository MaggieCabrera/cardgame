<?php 
class Card {

    public $image;
    public $health;
    public $attack;
    public $cost;
    
    public function __construct(int $page = 1, int $position = 1) {
        $api = new BlizzardApi();
        $cards = $api->cardList('minion', $page);
        $this->setCard($cards->cards[$position]);
    }

    /**
     * Save card info
     *
     */
    public function setCard ($card) {
        $this->image = $card->image;
        $this->attack = $card->attack;
        $this->health = $card->health;
        $this->cost = $card->manaCost;
    }

}
?>