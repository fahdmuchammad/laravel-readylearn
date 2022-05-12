<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Auth;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $cek = Auth::user()->role;
        if ($cek == 0) {
            return redirect('dashboard');
        }
        return view('admin.home');
    }

    // public function login()
    // {
    //     if (!Session::get('login')) {
    //         return view('admin.login');
    //     } else {
    //         return redirect('adminlogin');
    //     }
    // }

    // public function loginPost(Request $request)
    // {
    //     $name = $request->name;
    //     $password = $request->password;

    //     $data = Admin::where('name', $name)->first();
    //     if ($data) {
    //         //apakah email tersebut ada atau tidak
    //         if (Hash::check($password, $data->password)) {
    //             Session::put('name', $data->name);
    //             // Session::put('email', $data->email);
    //             Session::put('login', true);
    //             return redirect('adminhome');
    //         } else {
    //             return redirect('adminlogin')->with(
    //                 'alert',
    //                 'Password atau Email, Salah !'
    //             );
    //         }
    //     } else {
    //         return redirect('adminlogin')->with(
    //             'alert',
    //             'Password atau Email, Salah!'
    //         );
    //     }
    // }

    // public function logout()
    // {
    //     Session::flush();
    //     return redirect('adminlogin')->with('alert', 'Kamu sudah logout');
    // }

    // public function register(Request $request)
    // {
    //     return view('admin.register');
    // }

    // public function registerPost(Request $request)
    // {
    //     $this->validate($request, [
    //         'name' => 'required|min:4',
    //         // 'email' => 'required|min:4|email|unique:users',
    //         'password' => 'required',
    //         'confirmation' => 'required|same:password',
    //     ]);

    //     $data = new Admin();
    //     $data->name = $request->name;
    //     // $data->email = $request->email;
    //     $data->password = bcrypt($request->password);
    //     $data->save();
    //     return redirect('adminlogin')->with(
    //         'alert-success',
    //         'Kamu berhasil Register'
    //     );
    // }
}
