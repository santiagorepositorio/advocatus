<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ApprovedCourse;
use App\Mail\ApprovedCourses;
use App\Mail\RejectCourse;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.courses.index');
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
    {
        $this->authorize('revision', $course);
        return view('admin.courses.show', compact('course'));
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
    public function approved(Course $course)
    {
        $this->authorize('revision', $course);

        if(!$course->lessons || !$course->goals || !$course->requirements || !$course->image){
            return back()->with('info', 'No se puede aprobar sin estar completo');
        }
        
        $course->status =3;
        $course->save();
        //Mail::to($course->teacher->email)->send(new ApprovedCourses($course));
        //$mail = new ApprovedCourse($course);
       // Mail::to($course->teacher->email)->queue($mail);
        return redirect()->route('admin.courses.index')->with('info', 'El curso se publico con exito');
    }
     //Relacion uno a muchos

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
       // Mail::to($course->teacher->email)->send(new RejectCourse($course));
        return redirect()->route('admin.courses.index')->with('Curso Rechazado');
    }

    public function courses_users()
    {
        return view('admin.courses.courses-user');
    }

    public function courses_users_register(Course $course)
    {
        $students = $course->users()->paginate(10);
        return view('admin.courses.courses-user-register', compact('course', 'students'));
        
    }

    

  

}
