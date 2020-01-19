<?php
declare(strict_types=1);

namespace YogaStudioReservationModeling;

class Lesson
{
    /** @var array */
    private $studio;

    public function __construct($studio)
    {
        $this->studio = $studio;
    }

    public function getMaxAttendee(): int
    {
        return $this->studio['maxAttendee'];
    }
}
