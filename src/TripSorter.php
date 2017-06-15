<?php declare(strict_types=1);

namespace Application;

class TripSorter
{
    private $trip;
    private $sortedBoardingCards = [];

    public function __construct(Trip $trip)
    {
        $this->trip = $trip;
    }

    public function sort()
    {
        $this->sortedBoardingCards = $this->prepareSortedBoardingCards(
            $this->trip->getBoardingCards()
        );

        return $this;
    }

    public function generateHtml()
    {
        $html = '<ol>';

        foreach ($this->sortedBoardingCards as $boarding) {
            $html .= '<li>' . $boarding->__toString() . '</li>' ;
        }

        $html .= '<li>You have arrived at your final destination.</li></ol>';

        return $html;
    }

    private function prepareSortedBoardingCards(array $boardingCards) : array
    {
        $sorted[] = array_pop($boardingCards);

        while (count($boardingCards) > 0) {
            foreach ($boardingCards as $key => $card) {
                if (end($sorted)->getDestination() === $card->getOrigin()) {
                    array_push($sorted, $card);
                    unset($boardingCards[$key]);
                } elseif (reset($sorted)->getOrigin() === $card->getDestination()) {
                    array_unshift($sorted, $card);
                    unset($boardingCards[$key]);
                }
            }
        }

        return $sorted;
    }
}