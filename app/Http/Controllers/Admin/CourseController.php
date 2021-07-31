<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\ApprovedCourse;
use App\Mail\RejectCourse;

class CourseController extends Controller
{
    


    public function index(){

        $courses = Course::where('status', 2)->paginate(8);

        return view('admin.courses.index', compact('courses'));

    }

    public function show(Course $course){

        $this->authorize('revision', $course);

        return view('admin.courses.show', compact('course'));

    }


    public function approved(Course $course){

        // Only letting approve courses in status = 2.
        $this->authorize('revision', $course);

        // Checking if the course is complete before approved it.
        if (!$course->lessons || !$course->goals || !$course->requirements || !$course->image) {
            return back()->with('info', 'No se puede publicar un curso que no este completo.');
        }

        // Changing the status of a course to PUBLISH.
        $course->status = Course::PUBLICADO;
        $course->save();

        // Sending the notification email.
        $mail = new ApprovedCourse($course);
        Mail::to($course->teacher->email)->queue($mail);


        // Sending back to the pending to be approved list.
        return redirect()->route('admin.courses.index')->with('info', 'El curso se ha publicado con exito!');
    }


    public function observation(Course $course){
        return view('admin.courses.observation', compact('course'));
    }

    public function reject(Request $request, Course $course){

        $request->validate([
            'body' => 'required'
        ]);

        $course->observation()->create($request->all());
        $course->status = 1;
        $course->save();

        // Envio del email rechazando curso
        $mail = new RejectCourse($course);
        Mail::to($course->teacher->email)->queue($mail);

        return redirect()->route('admin.courses.index')->with('info', 'El curso se ha rechazado satisfactoriamente.');
    }
}
