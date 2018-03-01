<?php
/**
 * Created by PhpStorm.
 * User: laith
 * Date: 3/1/18
 * Time: 3:16 PM
 */
namespace Trips\Transportation;

class Flight extends Transportation
{
    private $transportationNumber;
    private $gate;
    private $baggage;

    function __construct($card = [])
    {
        parent::__construct($card);

        if (count($card)){
            $this->transportationNumber = isset($card['transportationNumber']) ? $card['transportationNumber'] : null;
            $this->gate = isset($card['gate']) ? $card['gate'] : null;
            $this->baggage = isset($card['baggage']) ? $card['baggage'] : null;
        }
    }


    private function transportationNumber(){
        if (is_null($this->transportationNumber))
            return '';
        return $this->transportationNumber;
    }

    private function gate(){
        if (is_null($this->gate))
            return '';
        return 'Gate '.$this->gate;
    }

    private function baggage(){
        if (is_null($this->baggage))
            return 'Baggage will we automatically transferred from your last leg.';
        return 'Baggage drop at ticket counter '.$this->baggage;
    }

    public function text(){
        $text = 'Take '. $this->transportationType().' '.$this->transportationNumber().' ';
        $text .= $this->from().' '.$this->to().'.';
        $text .= ' '.$this->gate().'.';
        $text .= ' '.$this->seat().'.';
        $text .= ' '.$this->baggage().'.';

        return $text;
    }

}