@extends('layout.main')

@section('content')
  <div class="row px-3">
    @foreach ($kelas as $k)
    <div class="col-lg-6 col-md-6">
      <div class="card z-index-2 mb-4">
        <div class="card-header p-0 position-relative mt-n2 mx-3 z-index-2 bg-transparent">
          <div class="bg-gradient-info shadow-info border-radius-lg py-2">
            <h6 class="text-white px-3">{{ $k->kelas }}</h6>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-6">
              <span class="h6 mb-0">{{ $jumlahSiswa[$k->kelas]['proses'] }}</span>/{{ $jumlahSiswa[$k->kelas]['total'] }} Siswa
              <p class="text-sm ">Sudah Diproses &nbsp;
                <span class="text-info h6">
                  @if ($jumlahSiswa[$k->kelas]['proses'] != 0)
                    {{ round($jumlahSiswa[$k->kelas]['proses']/$jumlahSiswa[$k->kelas]['total']*100) }}%
                  @else
                    {{ '0%' }}
                  @endif
                </span>
              </p>
            </div>
            <div class="col-6 d-flex align-items-center justify-content-end">
              <a href="/status/{{ $k->kelas }}" class="mx-3 btn bg-gradient-dark text-xs"><i class="material-icons text-sm">edit</i> Proses</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>

@endsection