<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Lesson;
use Livewire\Component;

class CourseStatus extends Component
{
    public $course, $current, $previous, $index, $next;

    public function mount(Course $course){
        $this->course = $course;

        foreach($course->lessons as $lesson){
            if(!$lesson->completed){
                $this->current = $lesson;

                $this->index = $course->lessons->search($lesson);
                $this->previous = $course->lessons[$this->index - 1];
                $this->next = $course->lessons[$this->index + 1];

                break;
            }
        }
        
    }

    public function render()
    {
        return view('livewire.course-status');
    }

    public function changeLesson(Lesson $lesson){

        $this->current = $lesson;

        $this->index = $this->course->lessons->search($lesson);

    }
}
