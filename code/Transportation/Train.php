<?php
/**
 * Created by PhpStorm.
 * User: laith
 * Date: 3/1/18
 * Time: 3:59 PM
 */
namespace Trips\Transportation;

class Train extends Transportation
{
    private $transportationNumber;

    function __construct($card = [])
    {
        parent::__construct($card);

        if (count($card)){
            $this->transportationNumber = isset($card['transportationNumber']) ? $card['transportationNumber'] : null;
        }
    }


    private function transportationNumber(){
        if (is_null($this->transportationNumber))
            return '';
        return $this->transportationNumber;
    }

    public function text(){
        $text = 'Take '. $this->transportationType().' '.$this->transportationNumber().' ';
        $text .= $this->from().' '.$this->to().'.';
        $text .= ' '.$this->seat().'.';

        return $text;
    }
}