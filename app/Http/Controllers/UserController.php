<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('user.index', compact('users'));
    }
    public function create(){
        return view('user.create');
    }
    public function store(Request $request){
        if($request->password !== $request->confirm_password){
            return back()->withErrors(['message' => 'Konfirmasi password salah!']);
        }
        if(User::whereEmail($request->email)->exists()){
            return back()->withErrors(['message' => 'Email sudah digunakan!']);
        }

        User::create($request->except('_token', 'confirm_password'));

        return redirect()->route('user.index');
    }
    public function destroy(int $id){
        if(Auth::user()->id === $id){
            return back()->withErrors(['message' => 'Tidak bisa menghapus akun saat digunakan!']);
        }

        User::whereId($id)->delete();
        return redirect()->route('user.index');
    }
}
