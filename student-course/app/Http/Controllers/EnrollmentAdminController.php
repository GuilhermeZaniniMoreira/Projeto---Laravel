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
        //$user = User::findOrFail(User::all()->id);
        //$users = User::all();
        
        //$courses = Course::findOrFail(1);
        
        //$enrollmentsWaiting = $users->courses()->where('authorized', false);

        //dd($enrollmentsWaiting);
        /*
        $courses = Course::findOrFail($id);
        $courses_users = $courses->users()->paginate(5);
        
       $users = User::with(['courses' => function ($query) {
            $query->where('authorized', 0);
        
        }])->get();

        */

        $users = User::all();

        $courses_users = $courses->users()->paginate(5);

        return view('enrollmentsAdmin/index', ['courses' => $courses], 
                                              ['courses_users' => $courses_users]);
    }

    public function create() 
    {   
        $users = User::pluck('name', 'id');

        $courses = Course::pluck('name', 'id');
    
        return view('enrollmentsAdmin/new',  ['users' => $users,'courses' => $courses]);
    }

    public function store(Request $request)
    {
        $courseId = $request->input('course');
        $userId =  $request->input('user');
        $user = User::findOrFail($userId);
        $user->courses()->attach($courseId, ['authorized' => true]);

        \Session::flash('status', 'Matricula realizada com sucesso!');
            return redirect('enrollmentsAdmin');
    }

    public function destroy($id) {
        $c = Course::findOrFail($id);
        $c->delete();

        \Session::flash('status', 'Curso excluído com sucesso.');
        return redirect('courses');
    }
}
