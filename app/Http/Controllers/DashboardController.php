<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'kelas' => Kelas::all()->count(),
            'siswa' => Student::all()->count(),
            'status' => Student::where('status', '!=', '-')->get()->count(),
            'lulus' => Student::where('status', 'Lulus')->get()->count(),
            'tidak_lulus' => Student::where('status', 'Tidak Lulus')->get()->count()
        ];

        return view('dashboard', [
            'title' => 'Dashboard',
            'data' => $data
        ]);
    }

    public function login()
    {
        return view('login', []);
    }

    public function auth(Request $request)
    {
        $validation = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        if (Auth::attempt($validation)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->with('error', 'Email atau password salah!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
