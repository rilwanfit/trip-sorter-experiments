<?php declare(strict_types=1);

namespace Application\Tests\Unit\BoardingCard;

use Application\BoardingCard\AirBus;
use Application\Contracts\BoardingCardInterface;
use PHPUnit\Framework\TestCase;

class AirBusTest extends TestCase
{
    private $boardingCard;

    public function setUp()
    {
        $this->boardingCard = new AirBus('Casablanca', 'Gerona Airport', null, null);
    }
    public function testCreation()
    {
        $this->assertInstanceOf(AirBus::class, $this->boardingCard);
    }

    public function testItShouldImplementsBoardingCardInterface()
    {
        $this->assertInstanceOf(BoardingCardInterface::class, $this->boardingCard);
    }

    public function testPrintableInHumanReadableForm()
    {
        $this->assertEquals(
                "Take the airport bus from Casablanca to Gerona Airport. No seat assignment.",
            $this->boardingCard->__toString()
        );
    }
}