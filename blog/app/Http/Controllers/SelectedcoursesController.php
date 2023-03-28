<?php

namespace App\Http\Controllers;

use App\selectedcourses;
use Illuminate\Http\Request;
use App\Course;
use Illuminate\Support\Facades\Auth;



class SelectedcoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // 取得當前登入的用戶
        $user = Auth::user();

        // 取得該用戶所選的課程
        $selectedCourses = $user->selectedCourses;
        return view('selectedcourses.index', compact('selectedCourses'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $selectedCourse = new selectedcourses();
        $selectedCourse->course_id = $request->input('course_id');
        $course = Course::find($request->input('course_id'));
        $selectedCourse->name = $course->name;
        $selectedCourse->credit = $course->credit;
        $selectedCourse->teacher = $course->teacher;
        $selectedCourse->class_code = $course->class_code;
        $selectedCourse->user_id = auth()->user()->id;
        $selectedCourse->save();

        return redirect()->route('selectedcourses.index')->with('success','Selected Course added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\selectedcourses  $selectedcourses
     * @return \Illuminate\Http\Response
     */
    public function show(selectedcourses $selectedcourses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\selectedcourses  $selectedcourses
     * @return \Illuminate\Http\Response
     */
    public function edit(selectedcourses $selectedcourses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\selectedcourses  $selectedcourses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, selectedcourses $selectedcourses)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\selectedcourses  $selectedcourses
     * @return \Illuminate\Http\Response
     */
    public function destroy($course_id)
    {
        $selected_course = SelectedCourses::where('course_id', $course_id)
            ->where('user_id', auth()->user()->id)
            ->firstOrFail();
        $selected_course->delete();
        return redirect()->route('selectedcourses.index')->with('success', '成功刪除選課');
    }
}
