<?php declare(strict_types=1);

namespace Application\Tests\Unit;

use Application\BoardingCard\AirBus;
use Application\BoardingCard\Flight;
use Application\BoardingCard\Train;
use Application\Trip;
use PHPUnit\Framework\TestCase;

class TripTest extends TestCase
{
    private $trip;

    public function setUp()
    {
        $this->trip = new Trip();
    }

    public function testCreation()
    {
        $this->assertInstanceOf(Trip::class, $this->trip);
    }

    public function testAddBoardingCard()
    {
        $this->assertEmpty($this->trip->getBoardingCards());

        $flight1 = new Flight('Stockholm', 'New York JFK', 'SK22', '7B', '22', null);
        $this->trip->addBoardingCard($flight1);
        $this->assertCount(1, $this->trip->getBoardingCards());

        $flight2 = new Flight('Gerona Airport', 'Stockholm', 'SK455', '3A', '45B', null);
        $this->trip->addBoardingCard($flight2);
        $this->assertCount(2, $this->trip->getBoardingCards());

        $this->trip->addBoardingCard(new Train('Madrid', 'Casablanca', '78A', '45B'));
        $this->assertCount(3, $this->trip->getBoardingCards());

        $this->trip->addBoardingCard(new AirBus('Casablanca', 'Gerona Airport', null, null));
        $this->assertCount(4, $this->trip->getBoardingCards());
    }
}