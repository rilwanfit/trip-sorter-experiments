<?php declare(strict_types=1);

namespace Application\BoardingCard;

class AirBus extends AbstractBoardingCard
{
    public function __toString()
    {
        return sprintf(
            "Take the airport bus from %s to %s. %s",
            $this->getOrigin(),
            $this->getDestination(),
            $this->getSeatNumber()
        );
    }
}