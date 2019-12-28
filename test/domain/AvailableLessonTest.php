<?php
declare(strict_types=1);

namespace YogaStudioReservationModeling\Test;

use PHPUnit\Framework\TestCase;
use YogaStudioReservationModeling\AvailableLesson;

class AvailableLessonTest extends TestCase
{
    /**
     * @param int $remaining
     * @param int $expected
     * @dataProvider dataCheckAvailableLesson
     */
    public function testCheckAvailableLesson(int $remaining, int $expected)
    {
        $lesson = new AvailableLesson();
        $value = $lesson->getAvailability($remaining);
        $this->assertSame($expected, $value);
    }

    public function dataCheckAvailableLesson()
    {
        return [
            '残り枠がない' => [
                'remaining' => 0,
                'expected' => 0,
            ],
            '3枠以下' => [
                'remaining' => 3,
                'expected' => 1,
            ],
            '3枠未満' => [
                'remaining' => 2,
                'expected' => 1,
            ],
            '3枠より多くある' => [
                'remaining' => 4,
                'expected' => 2,
            ],
        ];
    }
}
