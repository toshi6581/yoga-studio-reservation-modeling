<?php
declare(strict_types = 1);

namespace YogaStudioReservationModeling;

class Reservation
{
    //枠の空いてる数を取得（どのレッスン？）
    //ユーザーから渡ってきた、どのレッスン、人数が何人かの情報を取得
    //指定されたレッスンの枠の空いてる数と、予約希望人数を比較する
    //予約希望人数が空いているレッスン枠以内であればtrueを返す
    //予約希望人数が空いているレッスン枠以上であればfalseを返す
    // レッスン（スタジオと講師とレッスンの内容） → レッスン枠（何曜日の何時からやります。人数、最大人数（＝スタジオの最大人数と同じ））
    /**
     * @param int $reserverCount
     * @return bool
     */
    public function makeReservation(/* スケジュール枠, */int $reserverCount): bool
    {
        $remaining = $reserverCount === 1 ? 1 : 0;
        $availableLesson = new AvailableLesson();
        $availability = $availableLesson->getAvailability($remaining);

        return $availability !== 0;
    }
}
