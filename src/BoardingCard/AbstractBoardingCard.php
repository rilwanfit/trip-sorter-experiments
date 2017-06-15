<?php declare(strict_types=1);

namespace Application\BoardingCard;

use Application\Contracts\BoardingCardInterface;

abstract class AbstractBoardingCard implements BoardingCardInterface
{
    protected $origin;
    protected $destination;
    private $name = null;
    private $seatNumber = null;

    public function __construct(string $igin, string $destination, ?string $name, ?string $seatNumber)
    {
        $this->origin = $origin;
        $this->destination = $destination;

        $this->name = $name;

        if (! is_null($seatNumber)) {
            $this->seatNumber = $seatNumber;
        } else {
            $this->seatNumber = 'No seat assignment.';
        }
    }

    public function getName() : ?string
    {
        return $this->name;
    }

    public function getSeatNumber() : ?string
    {
        return $this->seatNumber;
    }

    public function getOrigin() : string
    {
        return $this->origin;
    }

    public function getDestination() : string
    {
        return $this->destination;
    }

    abstract public function __toString();
}