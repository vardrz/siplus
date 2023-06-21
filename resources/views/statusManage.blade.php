@extends('layout.main')

@section('content')

    <div class="card z-index-2 px-3 mb-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
            <div class="bg-gradient-info shadow-info border-radius-lg py-3">
                <h5 class="text-white px-3">Kelas {{ $kelas }}</h5>
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
                            <th class="text-uppercase text-dark text-xs font-weight-bolder ps-2">Tempat, Tanggal Lahir</th>
                            <th class="text-uppercase text-dark text-xs font-weight-bolder ps-2">Status Kelulusan</th>
                            <th class="text-uppercase text-dark text-xs font-weight-bolder ps-2">Proses</th>
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
                                <p class="text-xs font-weight-bold mb-0">{{ $s->ttl }}</p>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">
                                    @if ($s->status != '-')
                                        @if ($s->status == 'Lulus')
                                            <span class="bg-success text-md text-white">&nbsp;{{ $s->status }}&nbsp;</span>
                                        @else
                                            <span class="bg-danger text-md text-white">&nbsp;{{ $s->status }}&nbsp;</span>
                                        @endif
                                    @else
                                        Belum Diproses
                                    @endif
                                </p>
                            </td>
                            <td class="align-middle">
                                <form method="POST" action="/status">
                                    @csrf
                                    <input type="hidden" name="nisn" value="{{ $s->nisn }}">
                                    <input type="hidden" name="status" value="Lulus">
                                    <input type="hidden" name="kelas" value="{{ $s->kelas }}">
                                    <input type="submit" value="Lulus" onclick="return confirm('Luluskan {{ $s->name }}?')" class="text-success font-weight-bold text-xs">
                                </form>
                                <form method="POST" action="/status">
                                    @csrf
                                    <input type="hidden" name="nisn" value="{{ $s->nisn }}">
                                    <input type="hidden" name="status" value="Tidak Lulus">
                                    <input type="hidden" name="kelas" value="{{ $s->kelas }}">
                                    <input type="submit" value="Tidak Lulus" onclick="return confirm('Tidak Luluskan {{ $s->name }}?')" class="text-danger font-weight-bold text-xs">
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