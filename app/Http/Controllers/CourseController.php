<?php

namespace App\Http\Controllers;
use Illuminate\Auth\Access\Response;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $courses = Course::all();
        return view('course.list',[
            'courses' => $courses
        ]);
    }

    public function create(Request $request){
        $course = new Course();
        $course->course_name = $request->course_name;
        $course->subject_name = $request->subject_name;
        $course->subject_overview = $request->subject_overview;
        $course->instructor_name = $request->instructor_name;
        $course->video = $request->video;
        $course->thumbnail = $request->thumbnail;
        $course->save();
        return redirect()->route('course.done', ['id' => $course->id]);
    }

    public function add()
    {
        return view('course.add');
    }
    public function detail($courseID)
    {
//        dd($courseID);
        $course = Course::where([
            'id' =>$courseID
        ])->first();
//        dd($course);
        return view('course.detail',[
            'course' => $course
        ]);
    }
    public function doneRegister()
    {
        return view('course.done');
    }

}
