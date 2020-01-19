<?php

//require_once('AlailableLesson.php); and need to extend class?
//to use getAvailability?

declare(strict_types=1);

namespace YogaStudioReservationModeling;

class LessonScheduleSlot
{
    // レッスン（スタジオと講師とレッスンの内容） → 
    // private $studio;
    // private $teacher;
    //今は$lessonだけでOK。こんな感じで値を取る$lesson->studio->maxAttendee 
    private $lesson;

    //レッスン枠（何曜日の何時からやります。現在の予約人数、最大人数（＝スタジオの最大人数と同じ））
    private $startLesson;
    private $endLesson;
    private $currentAttendee;
    private $maxAttendee;

    public function __construct($lesson, $startLesson, $endLesson, $currentAttendee, $maxAttendee)
    {
        $this->lesson = $lesson;
        $this->startLesson = $startLesson;
        $this->endLesson = $endLesson;
        $this->currentAttendee = $currentAttendee;
        $this->maxAttendee = $maxAttendee;
    }

    public function getRemainingNumberOfAttendee(): int
    {
        return $this->maxAttendee - $this->currentAttendee;
    }
}
