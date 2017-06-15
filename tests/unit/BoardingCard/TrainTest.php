<?php declare(strict_types=1);

namespace Application\Tests\Unit\BoardingCard;

use Application\BoardingCard\Train;
use Application\Contracts\BoardingCardInterface;
use PHPUnit\Framework\TestCase;

class TrainTest extends TestCase
{
    private $boardingCard;

    public function setUp()
    {
        $this->boardingCard = new Train('Madrid', 'Casablanca', '78A', '45B');
    }
    public function testCreation()
    {
        $this->assertInstanceOf(Train::class, $this->boardingCard);
    }

    public function testItShouldImplementsBoardingCardInterface()
    {
        $this->assertInstanceOf(BoardingCardInterface::class, $this->boardingCard);
    }


    public function testPrintableInHumanReadableForm()
    {
        $this->assertEquals(
            "Take train 78A from Madrid to Casablanca. Sit in seat 45B.",
            $this->boardingCard->__toString()
        );
    }
}