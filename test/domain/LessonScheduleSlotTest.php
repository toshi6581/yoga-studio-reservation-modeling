<?php

declare(strict_types=1);

namespace YogaStudioReservationModeling\Test;

use PHPUnit\Framework\TestCase;
use YogaStudioReservationModeling\Lesson;
use YogaStudioReservationModeling\LessonScheduleSlot;
use YogaStudioReservationModeling\Studio;

class LessonScheduleSlotTest extends TestCase
{
    public function testGetRemainingNumberOfAttendee()
    {
        $studio = new Studio('studio A', 10);
        $slot = new LessonScheduleSlot(new Lesson($studio), null, null, 5);
        $remaining = $slot->getRemainingNumberOfAttendee();

        $this->assertSame(5, $remaining);
    }
}
