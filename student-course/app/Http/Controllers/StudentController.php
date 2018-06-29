<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Student;
use App\Course;
use App\User;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $students = DB::table('users')->where('type', 'student')->get();

        return view('students/index', ['students' => $students]);
    }

    public function create() 
    {
        return view('students/new');
    }

    public function store(Request $request)
    {
        $s = new Student;
        $s->name = $request->input('name');
        $s->CPF = $request->input('cpf');
        $s->RG = $request->input('rg');
        $s->adress = $request->input('adress');
        $s->phoneNumber = $request->input('phoneNumber');
        
        if ($s->save()) {
            \Session::flash('status', 'Estudante cadastrado!');
            return redirect('/students');
        } else {
            \Session::flash('status', 'Ocorreu um erro ao cadastrar o estudante!');
            return view('students.new');
        }
    }

    public function edit($id) {

        $student = Student::findOrFail($id);

        return view('students.edit', ['student' => $student]);
    }

    public function update(Request $request, $id) {
        $s = Student::findOrFail($id);
        $s->name = $request->input('name');
        $s->CPF = $request->input('cpf');
        $s->RG = $request->input('rg');
        $s->adress = $request->input('adress');
        $s->phoneNumber = $request->input('number');
        
        if ($s->save()) {
            \Session::flash('status', 'Estudante atualizado!');
            return redirect('/students');
        } else {
            \Session::flash('status', 'Ocorreu um erro ao atualizar o estudante.');
            return view('students.edit', ['student' => $s]);
        }
    }

    public function destroy($id) {
        $s = Student::findOrFail($id);
        $s->delete();

        \Session::flash('status', 'Estudante excluídp com sucesso.');
        return redirect('/students');
    }

    public function enrollment($id) {
        $s = Student::findOrFail($id);
        $courses = Course::pluck('name');        

        return view('students.enrollment', ['student' => $student, 'courses' => $courses]);
    }
}
