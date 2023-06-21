<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Http\Requests\StoreKelasRequest;
use App\Http\Requests\UpdateKelasRequest;

class KelasController extends Controller
{
    public function index()
    {
        return view('kelas', [
            'title' => 'Kelas',
            'kelas' => Kelas::all()
        ]);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'kelas' => 'required',
            'jurusan' => 'required'
        ]);

        Kelas::insert($validate);

        return redirect('/kelas')->with('success', 'Kelas berhasil ditambahkan.');
    }

    public function update(Request $request)
    {
        $validate = $request->validate([
            'kelas' => 'required',
            'jurusan' => 'required'
        ]);

        Kelas::where('id', $request->id)->update($validate);

        return redirect('/kelas')->with('success', 'Kelas berhasil update.');
    }

    public function destroy(Request $request)
    {
        $id = $request->id;

        Kelas::destroy($id);

        return redirect('/kelas')->with('success', 'Kelas berhasil dihapus.');
    }
}
