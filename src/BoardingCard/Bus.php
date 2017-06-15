<?php declare(strict_types=1);

namespace Application\BoardingCard;

class Bus extends AbstractBoardingCard
{
    public function __toString()
    {
        return sprintf(
            "Take Bus %s from %s to %s. Sit in seat %s.",
            $this->getName(),
            $this->getOrigin(),
            $this->getDestination(),
            $this->getSeatNumber()
        );
    }
}