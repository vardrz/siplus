@extends('layout.main')

@section('content')

    <div class="card z-index-2 px-3 mb-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
            <div class="bg-gradient-info shadow-info border-radius-lg py-3">
            <div class="chart">
                <div class="row">
                    <div class="col-6">
                        <h5 class="text-white px-3">Siswa</h5>
                    </div>
                    <div class="col-6 d-flex align-items-center justify-content-end">
                        <a href="/siswa/add" class="mx-3 btn bg-gradient-dark text-xs"><i class="material-icons text-sm">add</i> Add</a>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="card-body">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible text-white" role="alert">
                    <span class="text-sm">{{ session('success') }}</span>
                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" id="siswa">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-dark text-xs font-weight-bolder">NISN</th>
                            <th class="text-uppercase text-dark text-xs font-weight-bolder ps-2">Nama</th>
                            <th class="text-uppercase text-dark text-xs font-weight-bolder ps-2">Kelas</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($siswa as $s)
                        <tr>
                            <td>
                                <h6 class="mb-0 text-sm">{{ $s->nisn }}</h6>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{ $s->name }}</p>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{ $s->kelas }}</p>
                            </td>
                            <td class="align-middle">
                                <a href="/siswa/edit/{{ $s->id }}" class="text-info font-weight-bold text-xs">
                                Edit
                                </a>
                                <form method="POST" action="/siswa/delete">
                                    @method('delete')
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $s->id }}">
                                    <input type="submit" value="Delete" onclick="return confirm('Hapus {{ $s->name }}?')" class="text-danger font-weight-bold text-xs">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection