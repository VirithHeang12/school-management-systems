<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\ClassSection;
use App\Models\Course;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassSectionController extends Controller
{
    public function index()
    {
        $userEmail = Auth::user()->email;
        $personId = Person::where('person_email', $userEmail)->get()[0]->id;
        $classes = ClassSection::where('person_id', $personId)->get();
        $courses = [];
        $i = 0;

        foreach ($classes as $class) {
            $courseDb = Course::find(['id', $class->course_id])[0];;
            $class['course_image'] = $courseDb->course_image;
            $class['course_title'] = $courseDb->course_title;
            $class['course_description'] = $courseDb->course_description;
            $courses[$i] = $class;
            $i++;
        }

//        dd($classes);
        return view('classes-taught', compact('courses'));
    }
}
