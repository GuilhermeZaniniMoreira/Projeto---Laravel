<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $students = Student::all();

        return view('students/index', ['students' => $students]);
    }

    public function create() 
    {
        return view('students/new',  ['students' => $students]);
    }

    public function store(Request $request)
    {
        $s = new Student;
        $s->name = $request->input('name');
        $s->CPF = $request->input('cpf');
        $s->RG = $request->input('rg');
        $s->adress = $request->input('adress');
        $s->phoneNumber = $request->input('number');
        
        if ($s->save()) {
            \Session::flash('status', 'Estudante cadastrado!');
            return redirect('/students');
        } else {
            \Session::flash('status', 'Ocorreu um erro ao cadastrar o estudante!');
            return view('students.new');
        }
    }

    public function edit($id) {
        $students = Student::findOrFail($id);
        //$states = State::pluck('nome', 'id');

        return view('students.edit', ['stundent' => $studet]);
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
}
