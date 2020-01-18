<?php

declare(strict_types=1);

namespace YogaStudioReservationModeling;

class AvailableLesson
{
    /**
     * 枠がない: 0
     * 3枠以下: 1
     * それ以外: 2
     * @param int $remaining
     * @return int
     */
    public function getAvailability(int $remaining): int
    {
        if ($remaining === 0) {
            return 0;
        }

        if ($remaining <= 3) {
            return 1;
        }

        return 2;
    }
}
