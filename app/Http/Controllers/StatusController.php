<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Student;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index()
    {
        $jumlahSiswa = [];
        foreach (Kelas::all() as $k) {
            $jumlahSiswa[$k->kelas] = [
                'proses' => Student::where('kelas', $k->kelas)->where('status', '!=', '-')->get()->count(),
                'total' => Student::where('kelas', $k->kelas)->get()->count(),
            ];
        }

        return view('status', [
            'title' => 'Status Kelulusan',
            'kelas' => Kelas::all(),
            'jumlahSiswa' => $jumlahSiswa
        ]);
    }

    public function show($kelas)
    {
        return view('statusManage', [
            'title' => 'Kelola Status Kelulusan',
            'kelas' => $kelas,
            'siswa' => Student::where('kelas', $kelas)->get()
        ]);
    }

    public function update(Request $request)
    {
        $status = [
            'status' => $request->status
        ];

        Student::where('nisn', $request->nisn)->update($status);

        return redirect('/status/' . $request->kelas)->with('success', 'Status berhasil update.');
    }
}
