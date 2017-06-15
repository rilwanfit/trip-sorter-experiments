<?php declare(strict_types=1);

namespace Application\BoardingCard;

class Flight extends AbstractBoardingCard
{
    private $gate;
    private $luggageInformation;

    public function __construct(
        string $origin,
        string $destination,
        ?string $name,
        ?string $seatNumber,
        string $gate,
        ?string $luggageInformation
    ) {
        $this->gate = $gate;

        if (! is_null($luggageInformation)) {
            $this->luggageInformation = $luggageInformation;
        } else {
            $this->luggageInformation = 'Baggage will be automatically transferred from your last leg.';
        }

        parent::__construct($origin, $destination, $name, $seatNumber);
    }

    public function getGate() : string
    {
        return $this->gate;
    }

    public function getLuggageInformation() : string
    {
        return $this->luggageInformation;
    }

    public function __toString()
    {
        return sprintf(
            "From %s, take flight %s to %s. Gate %s, seat %s. %s",
            $this->getOrigin(),
            $this->getName(),
            $this->getDestination(),
            $this->getGate(),
            $this->getSeatNumber(),
            $this->getLuggageInformation()
        );
    }
}