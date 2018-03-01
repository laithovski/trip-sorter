<?php
/**
 * Created by PhpStorm.
 * User: laith
 * Date: 3/1/18
 * Time: 2:10 PM
 */
namespace Trips\Transportation;

class Transportation
{
    protected $transportationType;
    protected $seat;
    protected $from;
    protected $to;

    function __construct($card = [])
    {
        if (count($card)){
            $this->transportationType = isset($card['transportationType']) ? ucwords(strtolower($card['transportationType'])) : null;
            $this->seat = isset($card['seat']) ? $card['seat'] : null;
            $this->from = isset($card['from']) ? $card['from'] : null;
            $this->to = isset($card['to']) ? $card['to'] : null;
        }
    }


    public function transportationType(){
        return $this->transportationType;
    }

    public function seat(){
        if (is_null($this->seat))
            return 'No seat assignment';
        return 'Seat '.$this->seat;
    }


    public function from(){
        return 'From '.$this->from;
    }

    public function to(){
        return 'To '.$this->to;
    }


}