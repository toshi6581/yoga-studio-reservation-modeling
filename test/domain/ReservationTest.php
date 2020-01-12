<?php
declare(strict_types=1);

namespace YogaStudioReservationModeling\Test;

use PHPUnit\Framework\TestCase;
use YogaStudioReservationModeling\AvailableLesson;
use YogaStudioReservationModeling\Reservation;

class ReservationTest extends TestCase
{
    //予約希望人数が空いているレッスン枠以内であればtrueを返す
    //予約希望人数が空いているレッスン枠以上であればfalseを返す
    /**
     * @param int $reserverCount
     * @param bool $expected
     * @dataProvider dataMakeReservation
     */
    public function testMakeReservation(int $reserverCount, bool $expected)
    {
        $reservation = new Reservation();

        $actual = $reservation->makeReservation($reserverCount);

        $this->assertSame($expected, $actual, '予約処理の結果が正しいこと');
    }

    public function dataMakeReservation()
    {
        return [
            '予約できる' => [
                'reserverCount' => 1,
                'expected' => true,
            ],
            '予約できない' => [
                'reserverCount' => 2,
                'expected' => false,
            ],
        ];
    }
}
