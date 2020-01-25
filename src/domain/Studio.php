<?php

declare(strict_types=1);

namespace YogaStudioReservationModeling;

class Studio
{
    private $name;
    private $maxAttendee;

    public function __construct(string $name, int $maxAttendee)
    {
        $this->name = $name;
        $this->maxAttendee = $maxAttendee;
    }

    public function getMaxAttendee(): int
    {
        return $this->maxAttendee;
    }
}
