<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\File;
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
        // change the files to public
        $files = File::where('name_url', '=' ,$request->video)
            ->orwhere('name_url', '=' ,$request->thumbnail)
            ->get();
        foreach($files as $file){
            $file->public = 1;
            $file->save();
        }
        $course->save();
        return redirect()->route('course.done', ['id' => $course->id]);
    }

    public function add()
    {
        return view('course.add');
    }
    public function detail($courseID)
    {
        $course = Course::where([
            'id' =>$courseID
        ])->first();
        return view('course.detail',[
            'course' => $course
        ]);
    }
    public function doneRegister()
    {
        return view('course.done');
    }

}
