<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // retorna os usuários que contem seu type igual a student
    public function index()
    { 
        $users = DB::table('users')->where('type', 'default')->get();
        
        return view('admin/index', ['users' => $users]);
    }

    // opção para admin padrão dar permissão a outros usuarios
    public function admin($id)
    {
        DB::table('users')->where('id', $id)->update(['type' => 'admin']);

        $user = User::findOrFail($id);

        \Session::flash('status', $user->name+' agora é administrador!');
        return redirect('courses');
    }
}