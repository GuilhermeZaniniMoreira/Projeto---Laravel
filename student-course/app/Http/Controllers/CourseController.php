<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class CourseController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware('auth', ['except' => ['index','show']]);
    }

    public function index()
    {
        $courses = Course::all();

        return view('courses/index', ['courses' => $courses]);
    }

    public function create() 
    {
        return view('courses/new');
    }

    public function store(Request $request)
    {
        $c = new Course;
        $c->name = $request->input('name');
        $c->ementa = $request->input('ementa');
        $c->qtdStudents = $request->input('qtdStudents');
        
        if ($c->save()) {
            \Session::flash('status', 'Curso cadastrado!');
            return redirect('courses');
        } else {
            \Session::flash('status', 'Ocorreu um erro ao cadastrar o curso!');
            return view('courses.new');
        }
    }

    public function edit($id) {
        $course = Course::findOrFail($id);

        return view('courses.edit', ['course' => $course]);
    }

    public function update(Request $request, $id) {
        $c = Course::findOrFail($id);
        $c->name = $request->input('name');
        $c->ementa = $request->input('ementa');
        $c->qtdStudents = $request->input('qtdStudents');
        
        if ($c->save()) {
            \Session::flash('status', 'Curso atualizado!');
            return redirect('courses');
        } else {
            \Session::flash('status', 'Ocorreu um erro ao atualizar o curso.');
            return view('courses.edit', ['course' => $s]);
        }
    }

    public function destroy($id) {
        $c = Course::findOrFail($id);
        $c->delete();

        \Session::flash('status', 'Curso excluído com sucesso.');
        return redirect('courses');
    }
}
