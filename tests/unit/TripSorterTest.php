<?php declare(strict_types = 1);

namespace Application\Tests\Unit;

use Application\BoardingCard\AirBus;
use Application\BoardingCard\Flight;
use Application\BoardingCard\Train;
use Application\Trip;
use Application\TripSorter;
use PHPUnit\Framework\TestCase;

class TripSorterTest extends TestCase
{
    private $tripSorter;

    public function setUp()
    {
        $trip = new Trip();

        $flight1 = new Flight('Stockholm', 'New York JFK', 'SK22', '7B', '22', null);
        $trip->addBoardingCard($flight1);

        $flight2 = new Flight('Gerona Airport', 'Stockholm', 'SK455', '3A', '45B', 'Baggage drop at ticket counter 344.');
        $trip->addBoardingCard($flight2);
        $trip->addBoardingCard(new Train('Madrid', 'Casablanca', '78A', '45B'));
        $trip->addBoardingCard(new AirBus('Casablanca', 'Gerona Airport', null, null));

        $this->tripSorter = new TripSorter($trip);
    }

    public function testCreation()
    {
        $this->assertInstanceOf(TripSorter::class, $this->tripSorter);
    }

    public function testSortingWorkCorrectly()
    {
        $this->tripSorter->sort();

        $this->assertEquals($this->expectedDom(), $this->tripSorter->generateHtml());
    }

    private function expectedDom()
    {
        $html = '<ol>';
        $html .= '<li>Take train 78A from Madrid to Casablanca. Sit in seat 45B.</li>';
        $html .= '<li>Take the airport bus from Casablanca to Gerona Airport. No seat assignment.</li>';
        $html .= '<li>From Gerona Airport, take flight SK455 to Stockholm. Gate 45B, seat 3A. Baggage drop at ticket counter 344.</li>';
        $html .= '<li>From Stockholm, take flight SK22 to New York JFK. Gate 22, seat 7B. Baggage will be automatically transferred from your last leg.</li>' ;
        $html .= '<li>You have arrived at your final destination.</li></ol>';

        return $html;
    }
}