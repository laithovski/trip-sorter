<?php
/**
 * Created by PhpStorm.
 * User: laith
 * Date: 3/1/18
 * Time: 1:14 PM
 */

namespace Trips;


use PHPUnit\Runner\Exception;

class Trip
{

    private $cards;
    private $sortedCards;
    function __construct($cards = [])
    {
        $this->cards = $cards;
    }

    public function sort(){
        $cards = $this->cards;
        $noOfCards = count($cards);
        $this->sortedCards = $this->getTrip($cards, $noOfCards, 0);
        return $this;
//        return $this->html($sortedCards);
    }

    private function getTrip($cards,$noOfCards, $cardIndex){
        if ($cardIndex == $noOfCards - 1) {
            return $cards;
        }
        for ($currentCard = $cardIndex; $currentCard < $noOfCards; $currentCard++) {
            for ($nextCard = $currentCard + 1; $nextCard < $noOfCards; $nextCard++) {
                if ($cards[$currentCard]['from'] == $cards[$nextCard]['to']) {
                    $cards = $this->changeTrip($cards, $currentCard, $nextCard);

                    return $this->getTrip($cards, $noOfCards, $currentCard);
                }
            }
        }

        return $cards;
    }

    private function changeTrip($cards, $currentCard, $nextCard){
        $temp = $cards[$currentCard];
        $cards[$currentCard] = $cards[$nextCard];
        $cards[$nextCard] = $temp;

        return $cards;
    }


    public function toArray(){
        return $this->sortedCards;
    }

    public function toJSON(){
        return json_encode($this->toArray());
    }

    public function toHTML(){
        $sortedCards = $this->sortedCards;
        $html = '<ol>';
        foreach ($sortedCards as $card){
            $className = "Trips\\Transportation\\".$card['transportationType'];
            if(class_exists($className)){
                $obj = new $className($card);
                $html .= '<li>'.$obj->text().'</li>';
            } else {
                throw new Exception('Transportation '.$card['transportationType'].' not exist');
            }

        }
        $html .= '<li>You have arrived at your final destination.</li>';
        $html .= '</ol>';
        return $html;
    }

}