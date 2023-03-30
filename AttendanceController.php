<?php

namespace App\Http\Controllers;

use App\Models\attendance;
use Illuminate\Http\Request;
 use App\Http\Controllers\EvaluationController;
use App\Models\UserCourseTrainingPlan;
use App\Models\Course;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=array();
        $studentcourse=UserCourseTrainingPlan::with('course_training_plan')->where(['course_training_plan_id'=>1,'type'=>'s'])->get();

        $teatchercourse=UserCourseTrainingPlan::with('course_training_plan')->where(['course_training_plan_id'=>1,'type'=>'T'])->get();
$course = Course::findOrfail($studentcourse[0]->course_training_plan->course_id);
// dd($course->name);
        // $Materials=
        $items = attendance::get();

        return view('attendance.insert',compact('studentcourse','course','teatchercourse'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      $servy_user=UserSurvey::get();
        return view('attendance.insert')->with($servy_user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = [
            'user_survey_id'=>1
            ,'course_id'=>2,
            'attendence'=>[
                1=>[1=>1],
                2=>[2=>2]
            ]
        ];

        $item = attendance::create($input);

        dd($item);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(attendance $attendance)
    {
        //
    }
}
