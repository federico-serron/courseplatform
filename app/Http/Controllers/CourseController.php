<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('can:Listar cursos')->only('index');
    //     $this->middleware('can:Crear cursos')->only('create', 'store');
    //     $this->middleware('can:Actualizar cursos')->only('edit', 'update', 'goals');
    //     $this->middleware('can:Eliminar cursos')->only('destroy');
    // }

    public function index(){
        return view('courses.index');
    }

    public function show(Course $course){

        $this->authorize('published', $course);

        $similars = Course::where('category_id', $course->category_id)
                            ->where('id', '!=', $course->category_id)
                            ->where('status', Course::PUBLICADO)
                            ->latest('id')
                            ->take(5)
                            ->get();
        return view('courses.show', compact('course', 'similars'));
    }

    public function enrolled(Course $course){

        $course->students()->attach(auth()->user()->id);

        return redirect()->route('courses.status', $course);
    }

}
