<?php

namespace App\Http\Controllers;

use App\Models\ClassSection;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnrollController extends Controller
{
    public function index()
    {
        $enrolls = Auth::user()->person->enrolls;
        $courses = [];
        $i = 0;

        foreach ($enrolls as $enroll) {
            $courseDb = ClassSection::find(['id', $enroll->class_id])[0];
            $courseId = $courseDb->course_id;
            $roomId = $courseDb->room_id;
            $course = Course::find(['id', $courseId]);
            $course[0]['enroll_grade'] = $enroll->enroll_grade;
            $course[0]['class_id'] = $enroll->class_id;
            $course[0]['room_id'] = $roomId;
            $courses[$i] = $course;
            $i++;
        }

        return view('enrollment', compact('courses'));
    }
}
