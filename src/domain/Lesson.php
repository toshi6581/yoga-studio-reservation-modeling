<?php

declare(strict_types=1);

namespace YogaStudioReservationModeling;

class Lesson
{
    /** @var Studio */
    private $studio;

    public function __construct(Studio $studio)
    {
        $this->studio = $studio;
    }

    public function getMaxAttendee(): int
    {
        return $this->studio->getMaxAttendee();
    }
}
