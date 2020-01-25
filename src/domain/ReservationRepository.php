<?php
declare(strict_types=1);

namespace YogaStudioReservationModeling;

class ReservationRepository
{
    /** @var array | Reservation[] */
    private $items = [];

    public function add(Reservation $reservation): void
    {
        $this->items[] = $reservation;
    }

    public function count(): int
    {
        return count($this->items);
    }
}
