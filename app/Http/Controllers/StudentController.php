<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Student;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class StudentController extends Controller
{
    public function index()
    {
        return view('siswa', [
            'title' => 'Siswa',
            'siswa' => Student::all(),
        ]);
    }

    public function edit(Student $student)
    {
        return view('siswaEdit', [
            'title' => 'Edit Siswa',
            'siswa' => $student,
            'kelas' => Kelas::all(),
        ]);
    }

    public function add()
    {
        return view('siswaAdd', [
            'title' => 'Add Siswa',
            'kelas' => Kelas::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nisn' => 'required|unique:students',
            'name' => 'required',
            'ttl' => 'required',
            'kelas' => 'required',
            'status' => 'required'
        ]);

        Student::insert($validate);

        return redirect('/siswa')->with('success', 'Siswa berhasil ditambahkan.');
    }

    public function update(Request $request)
    {
        $validate = $request->validate([
            'nisn' => 'required|unique:students,nisn,' . $request->id . ',id',
            'name' => 'required',
            'ttl' => 'required',
            'kelas' => 'required'
        ]);

        Student::where('id', $request->id)->update($validate);

        return redirect('/siswa')->with('success', 'Data siswa berhasil update.');
    }

    public function destroy(Request $request)
    {
        $id = $request->id;

        Student::destroy($id);

        return redirect('/siswa')->with('success', 'Siswa berhasil dihapus.');
    }

    function APIget($nisn = null)
    {
        $student = Student::where('nisn', $nisn)->get();
        $skl = url('/skl') . '/' . $student[0]->nisn;

        if (count($student) > 0) {
            return response()->json(['code' => 200, 'message' => 'Data Ditemukan', 'data' => $student[0], 'skl' => $skl], 200);
        } else {
            return response()->json(['code' => 404, 'message' => 'Data Tidak Ditemukan'], 404);
        }
    }

    public function skl($nisn)
    {
        $data = Student::where('nisn', $nisn)->get();
        $kelas = Kelas::where('kelas', $data[0]->kelas)->get();
        $jurusan = $kelas[0]->jurusan;

        $pdf = PDF::loadView('skl', [
            'data' => $data[0],
            'jurusan' => $jurusan,
        ]);

        return $pdf->download('SKL-' . $nisn . '.pdf');
    }
}
