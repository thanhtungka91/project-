<?php

namespace App\Http\Controllers;
use Input;
use Image;
use Illuminate\Auth\Access\Response;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
//        dd($courses);
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
        $course->save();
        return redirect()->route('course.done', ['id' => $course->id]);
    }

    public function add()
    {
        return view('course.add');
    }
    public function doneRegister()
    {
        return view('course.done');
    }
    public function uploadfile()
    {
        $files = Input::file('files');

        if ($files) {

            $destinationPath = public_path() . '/uploads/';
            $results = [];
            foreach($files as $file){
                $filename = $file->getClientOriginalName();
                $upload_success = $file->move($destinationPath, $filename);
                $result = new \stdClass();
                $result->url= $destinationPath;
                array_push($results,$result);
            }
            if ($upload_success) {
                Image::make($destinationPath . $filename)->resize(100, 100)->save($destinationPath . "100x100_" . $filename);

                return response()->json([
                    'files' => $results
                ]);
            } else {
                return Response::json('error', 400);
            }
        }else{
            return response()->json([
                'name' => 'Abigail',
                'state' => 'CA'
            ]);
        }
    }
}
