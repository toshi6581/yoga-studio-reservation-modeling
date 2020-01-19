<?php
declare(strict_types=1);

namespace YogaStudioReservationModeling\Test;

use PHPUnit\Framework\TestCase;
use YogaStudioReservationModeling\Lesson;
use YogaStudioReservationModeling\LessonScheduleSlot;

class LessonScheduleSlotTest extends TestCase
{
    public function testGetRemainingNumberOfAttendee()
    {
        $slot = new LessonScheduleSlot(new Lesson(['maxAttendee' => 10]), null, null, 5);
        $remaining = $slot->getRemainingNumberOfAttendee();

        $this->assertSame(5, $remaining);
    }
}
