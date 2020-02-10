<?php

use App\Cards\BusBoardingCard;
use App\Cards\FlightBoardingCard;
use App\Cards\TrainBoardingCard;
use App\OutputFormat\Formatter;
use App\Trip;

require 'vendor/autoload.php';

/*
 * Start - Creating different types of cards Flight , Train , Bus
 */

$cards = [];

$cards[] = (new FlightBoardingCard('Stockholm', 'New York JFK'))
    ->seatNumber('7B')
    ->transportIdentificationNumber('SK22')
    ->gate(22);

$cards[] = (new TrainBoardingCard('Madrid', 'Barcelona'))
    ->seatNumber('45B')
    ->transportIdentificationNumber('78A');

$cards[] = (new BusBoardingCard('Barcelona', 'Gerona Airport'));

$cards[] = (new FlightBoardingCard('Gerona Airport', 'Stockholm'))
    ->seatNumber('3A')
    ->transportIdentificationNumber('SK455')
    ->gate('45B')
    ->baggageCounter(344);

/*
 * New Trip With cards generated
 */

$trip = new Trip();
foreach ($cards as $card) {
    $trip->addCard($card);
}

if (php_sapi_name() === 'cli') {
    $lineBreak = PHP_EOL;
} else {
    $lineBreak = '<br />';
}
$formatter = new Formatter();
echo $formatter->setLineBreak($lineBreak)
    ->format($trip);
