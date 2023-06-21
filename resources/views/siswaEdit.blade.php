@extends('layout.main')

@section('content')

    <div class="card z-index-2 px-3 mb-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
        <div class="bg-gradient-info shadow-info border-radius-lg py-3">
            <div class="chart">
                <h5 class="text-white px-5">Edit Data Siswa</h5>
            </div>
        </div>
        </div>
        <div class="card-body">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible text-white" role="alert">
                    <span class="text-sm">{{ $error }}</span>
                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endforeach
            @endif
            <form method="post" action="/siswa/edit" role="form" class="text-start">
            @csrf
            <input name="id" type="hidden" value="{{ $siswa->id }}">
            <div class="input-group input-group-outline my-3">
                <input type="text" value="NISN" class="form-control bg-info text-white" style="max-width: 80px; margin-right: 5px;" required readonly>
                <input name="nisn" type="text" value="{{ $siswa->nisn }}" class="form-control" required>
            </div>
            <div class="input-group input-group-outline my-3">
                <input type="text" value="NAMA" class="form-control bg-info text-white" style="max-width: 80px; margin-right: 5px;" required readonly>
                <input name="name" type="text" value="{{ $siswa->name }}" class="form-control" required>
            </div>
            <div class="input-group input-group-outline my-3">
                <input type="text" value="TTL" class="form-control bg-info text-white" style="max-width: 80px; margin-right: 5px;" required readonly>
                <input name="ttl" type="text" value="{{ $siswa->ttl }}" class="form-control" required>
            </div>
            <div class="input-group input-group-outline my-3">
                <input type="text" value="KELAS" class="form-control bg-info text-white" style="max-width: 80px; margin-right: 5px;" required readonly>
                <select name="kelas" class="form-control" required>
                    @foreach ($kelas as $k)
                        @if ($siswa->kelas == $k->kelas)
                            <option value="{{ $k->kelas }}" selected>{{ $k->kelas }}</option>
                        @else
                            <option value="{{ $k->kelas }}">{{ $k->kelas }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="text-center">
                <button type="submit" class="btn bg-gradient-dark w-100 mb-2">Simpan</button>
            </div>
            </form>
        </div>
    </div>

@endsection