<?php declare(strict_types=1);

namespace Application\Tests\Unit\BoardingCard;

use Application\BoardingCard\Bus;
use Application\Contracts\BoardingCardInterface;
use PHPUnit\Framework\TestCase;

class BusTest extends TestCase
{
    private $boardingCard;

    public function setUp()
    {
        $this->boardingCard = new Bus('Madrid', 'Casablanca', '788A', '4B');
    }
    public function testCreation()
    {
        $this->assertInstanceOf(Bus::class, $this->boardingCard);
    }

    public function testItShouldImplementsBoardingCardInterface()
    {
        $this->assertInstanceOf(BoardingCardInterface::class, $this->boardingCard);
    }

    public function testPrintableInHumanReadableForm()
    {
        $this->assertEquals(
            "Take Bus 788A from Madrid to Casablanca. Sit in seat 4B.",
            $this->boardingCard->__toString()
        );
    }
}