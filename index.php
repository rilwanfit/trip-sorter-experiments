<?php
use Application\BoardingCard\AirBus;
use Application\BoardingCard\Flight;
use Application\BoardingCard\Train;
use Application\Trip;
use Application\TripSorter;

require_once './vendor/autoload.php';

$trip = new Trip();

$flight1 = new Flight('Stockholm', 'New York JFK', 'SK22', '7B', '22', null);
$trip->addBoardingCard($flight1);

$flight2 = new Flight('Gerona Airport', 'Stockholm', 'SK455', '3A', '45B', 'Baggage drop at ticket counter 344.');
$trip->addBoardingCard($flight2);
$trip->addBoardingCard(new Train('Madrid', 'Casablanca', '78A', '45B'));
$trip->addBoardingCard(new AirBus('Casablanca', 'Gerona Airport', null, null));

echo 'Boarding Cards Stack : ' . PHP_EOL;
foreach ($trip->getBoardingCards() as $index => $item) {
    echo '[' . $index . '] Origin: ' . $item->getOrigin() . ' Destination: ' . $item->getDestination() . PHP_EOL;
}
echo 'After Processing : ' .PHP_EOL;
echo str_replace(['<ol><li>', '</li><li>',  '</li></ol>'],PHP_EOL, (new TripSorter($trip))->sort()->generateHtml());

