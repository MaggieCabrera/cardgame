<?php 
class Game {

    public $deck;
    public $opponent_deck;
    public $card_count;

    private $page_max;
    
    public function __construct(int $card_count) {
        $this->card_count = $card_count;
        $this->setPageMax();
        $this->createDeck();
    }

    /**
     * set Page Max, the maximum page we can access via the api
     *
     * @return object 
     */
    public function setPageMax () {
        $api = new BlizzardApi();
        $cards = $api->cardList();
        $this->page_max = $cards->pageCount;
    }

    /**
     * Gets the amount of cards played in the game
     *
     * @return int 
     */
    public function get_card_count () {
        return $this->card_count;
    }

    /**
     * Creates two decks of random cards. One deck for the player, one for the opponent. 
     * The amount of cards is determined by the value of card_count
     *
     */
    public function createDeck () {
        for ($i=0; $i < $this->card_count; $i++) { 
            $this->deck[] = $this->getRandomCard();
            $this->opponent_deck[] = $this->getRandomCard();
        }
    }

    /**
     * Gets the cards generated for the game
     *
     * @return array 
     */
    public function get_deck () {
        return $this->deck;
    }

    /**
     * Gets the opponent's cards generated for the game
     *
     * @return array 
     */
    public function get_opponent_deck () {
        return $this->opponent_deck;
    }

    /**
     * Generate a random card 
     *
     * @return object 
     */
    public function getRandomCard () {
        $page = rand(1, $this->page_max);
        $pos = rand(0, 4);
        $card = new Card($page, $pos);
        return $card;
    }

}
?>