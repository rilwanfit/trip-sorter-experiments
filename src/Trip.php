<?php declare(strict_types=1);

namespace Application;

use Application\Contracts\BoardingCardInterface;

class Trip
{
    private $boardingCards = [];

    public function addBoardingCard(BoardingCardInterface $boardingCard)
    {
        $this->boardingCards[] = $boardingCard;
    }

    public function getBoardingCards() : array
    {
        return $this->boardingCards;
    }
}