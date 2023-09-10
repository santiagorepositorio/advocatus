<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('courses.index');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {   // funcion que evita ver cursos no publicados
        $this->authorize('published', $course);
        
                $similares = Course::where('category_id' , $course->category_id)
                            ->where('id', '!=', $course->id)
                            ->where('status', 3)
                            ->latest('id')
                            ->take(5)
                            ->get();
        return view('courses.show', compact('course', 'similares'));
        
    }

    public function enrolled(Course $course)
    {
        $course->students()->attach(auth()->user()->id);
        return redirect()->route('courses.status', $course);
    }

    public function myCourses(){
        $courses = auth()->user()->courses_enrolled()->orderBy('course_user.created_at', 'desc')->paginate(12);

        return view('courses.my-courses', compact('courses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
