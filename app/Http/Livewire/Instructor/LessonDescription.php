<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Lesson;
use Livewire\Component;

class LessonDescription extends Component
{

    public $lesson, $description, $name;

    protected $rules = [
        'description.name' => 'required'
    ];

// MOUNT METHOD, GETTING ALL THE LESSON INFO AND ASSIGNING IT TO LESSON PROPRETY, WHICH IS CALLED FROM THE LIVEWIRE COMPONENT
    public function mount(Lesson $lesson){
        $this->lesson = $lesson;

        if ($lesson->description) {
            $this->description = $lesson->description;
        }
        
    }

// RENDER METHOD
    public function render()
    {
        return view('livewire.instructor.lesson-description');
    }

// STORE METHOD
    public function store(){
        
        $this->description = $this->lesson->description()->create(['name' => $this->name]);

        $this->reset('name');

        $this->lesson = Lesson::find($this->lesson->id);
    }

// UPDATE METHOD FOR LIVEWIRE COMPONENT: LESSON-DESCRIPTION
    public function update(){
        $this->validate();

        $this->description->save();

    }

// DESTROY METHOD
    public function destroy(){
        $this->description->delete();

        $this->reset('description');
        
        $this->lesson = Lesson::find($this->lesson->id);
    }
}
