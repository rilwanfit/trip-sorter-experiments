<?php declare(strict_types=1);

namespace Application\Tests\Unit\BoardingCard;

use Application\BoardingCard\Flight;
use Application\Contracts\BoardingCardInterface;
use PHPUnit\Framework\TestCase;

class FlightTest extends TestCase
{
    private $boardingCard;

    public function setUp()
    {
        $this->boardingCard = new Flight('Stockholm', 'New York JFK', 'SK22', '7B', '22', null);
    }
    public function testCreation()
    {
        $this->assertInstanceOf(Flight::class, $this->boardingCard);
    }

    public function testItShouldImplementsBoardingCardInterface()
    {
        $this->assertInstanceOf(BoardingCardInterface::class, $this->boardingCard);
    }

    public function testPrintableInHumanReadableForm()
    {
        $this->assertEquals(
            "From Stockholm, take flight SK22 to New York JFK. Gate 22, seat 7B. Baggage will be automatically transferred from your last leg.",
            $this->boardingCard->__toString()
        );
    }
}