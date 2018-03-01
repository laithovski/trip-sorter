<?php
/**
 * Created by PhpStorm.
 * User: laith
 * Date: 3/1/18
 * Time: 12:46 PM
 */

use Trips\Trip;

error_reporting(E_ALL);
ini_set('display_errors', 1);


$loader = require __DIR__.'/vendor/autoload.php';

$cards = [
    [
        "from"                      => "Gerona Airport",
        "to"                        => "Stockholm",
        "transportationType"        => "Flight",
        "transportationNumber"      => "SK455",
        "seat"                      => "3A",
        "gate"                      => "45B",
        "baggage"                   => "334",
    ],
    [
        "from"             => "Stockholm",
        "to"               => "New York",
        "transportationType"        => "Flight",
        "transportationNumber" => "SK22",
        "seat"                  => "7B",
        "gate"                  => "22",
    ],
    [
        "from"      => "Barcelona",
        "to"        => "Gerona Airport",
        "transportationType" => "Bus",
        "busName" => "Airport Bus",
    ],
    [
        "from"                 => "Madrid",
        "to"                   => "Barcelona",
        "transportationType"   => "Train",
        "transportationNumber" => "78A",
        "seat"                 => "45B",
    ],
];

$trip = new Trip($cards);
$tripCardsObj = $trip->sort();
echo $tripCardsObj->toHTML();

