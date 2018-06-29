<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\User;
use Illuminate\Support\Facades\Auth;

class EnrollmentAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   
        /*
        $user = User::findOrFail(1);
        $enrollmentsWaiting = $user->courses->where('authorized', false);
        dd($enrollmentsWaiting);
        */
        $user = User::get();
        $enrollmentsWaiting = $user->courses->name;
        dd($user->course->name);

        return view('enrollments/index', ['enrollmentsWaiting' => $enrollmentsWaiting]);
    }

    public function create() 
    {   
        $userId = Auth::id();
        $user = User::findOrFail($userId);

        $courses = Course::pluck('name', 'id');
    
        return view('enrollments/new',  ['courses' => $courses]);
    }

    public function store(Request $request)
    {
        $courseId = $request->input('course');
        $userId = Auth::id();
        $user = User::findOrFail($userId);
        $user->courses()->attach($courseId);

        \Session::flash('status', 'Matricula está em processo de aprovação!');
            return redirect('enrollments');
    }

    public function destroy($id) {
        $c = Course::findOrFail($id);
        $c->delete();

        \Session::flash('status', 'Curso excluído com sucesso.');
        return redirect('courses');
    }
}
