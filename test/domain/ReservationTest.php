<?php

declare(strict_types=1);

namespace YogaStudioReservationModeling\Test;

use PHPUnit\Framework\TestCase;
use YogaStudioReservationModeling\AvailableLesson;
use YogaStudioReservationModeling\Lesson;
use YogaStudioReservationModeling\LessonScheduleSlot;
use YogaStudioReservationModeling\Reservation;
use YogaStudioReservationModeling\ReservationRepository;
use YogaStudioReservationModeling\Studio;

class ReservationTest extends TestCase
{
    //予約希望人数が空いているレッスン枠以内であればtrueを返す
    //予約希望人数が空いているレッスン枠以上であればfalseを返す
    /**
     * @param int $reserverCount
     * @param bool $expectedResult
     * @param int $expectedAttendee
     * @dataProvider dataMakeReservation
     */
    public function testMakeReservation(int $reserverCount, bool $expectedResult, int $expectedAttendee)
    {
        $reservation = new Reservation();

        $studio = new Studio('studio A', 10);
        $lesson = new Lesson($studio);
        $slot = new LessonScheduleSlot($lesson, null, null, 9);

        $repository = new ReservationRepository();

        $actual = $reservation->makeReservation($slot, $reserverCount);

        $repository->add($reservation);

        $this->assertSame($expectedResult, $actual, '予約処理の結果が正しいこと');
        $this->assertSame(1, $repository->count());
        $this->assertSame($expectedAttendee, $slot->getCurrentAttendee());
    }

    public function dataMakeReservation()
    {
        return [
            '予約できる' => [
                'reserverCount' => 1,
                'expectedResult' => true,
                'expectedAttendee' => 10,
            ],
            '予約できない' => [
                'reserverCount' => 2,
                'expectedResult' => false,
                'expectedAttendee' => 9,
            ],
        ];
    }
}
