<?php declare(strict_types=1);

namespace Application\Contracts;

interface BoardingCardInterface
{
    public function getOrigin();

    public function getDestination();
}