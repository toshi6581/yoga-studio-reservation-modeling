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

    public function __construct(Lesson $lesson, $startLesson, $endLesson, $currentAttendee)
    {
        $this->lesson = $lesson;
        $this->startLesson = $startLesson;
        $this->endLesson = $endLesson;
        $this->currentAttendee = $currentAttendee;
    }

    public function getRemainingNumberOfAttendee(): int
    {
        return $this->lesson->getMaxAttendee() - $this->currentAttendee;
    }

    public function getCurrentAttendee(): int
    {
        return $this->currentAttendee;
    }

    public function addAttendee(int $count): void
    {
        $this->currentAttendee += $count;
    }
}
