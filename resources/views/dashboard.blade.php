@extends('layout.main')

@section('content')

    <div class="row px-3">
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
            <a href="/kelas">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">school</i>
                        </div>
                        <div class="text-end pt-1">
                            <h4 class="mb-0">{{ $data['kelas'] }}</h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                        <p class="mb-0 px-2"><b>Kelas</b></p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
            <a href="/siswa">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape bg-gradient-primary shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">person</i>
                        </div>
                        <div class="text-end pt-1">
                            <h4 class="mb-0">{{ $data['siswa'] }}</h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                        <p class="mb-0 px-2"><b>Siswa</b></p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
            <a href="status">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape bg-gradient-success shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">playlist_add_check</i>
                        </div>
                        <div class="text-end pt-1">
                            <span class="h6 text-success px-2">({{ round($data['status']/$data['siswa']*100) }}%) Diproses</span>
                            <span class="h4 mb-0">{{ $data['status'] }}</span>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                        <p class="mb-0 px-2"><b>Status Kelulusan</b></p>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="row px-3 mt-4">
        <div class="col-lg-6 col-md-6 mt-4 mb-4">
          <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1">
                <div class="chart">
                    <h3 class="text-white px-5">{{ round($data['lulus']/$data['siswa']*100) }}% Lulus</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <span class="h6 mb-0">{{ $data['lulus'] }}</span>/{{ $data['siswa'] }} Siswa
              <p class="text-sm ">Dinyatakan Lulus</p>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 mt-4 mb-4">
          <div class="card z-index-2  ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-danger shadow-danger border-radius-lg py-3 pe-1">
                <div class="chart">
                    <h3 class="text-white px-5">{{ round($data['tidak_lulus']/$data['siswa']*100) }}% Tidak Lulus</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <span class="h6 mb-0">{{ $data['tidak_lulus'] }}</span>/{{ $data['siswa'] }} Siswa
              <p class="text-sm ">Dinyatakan Tidak Lulus</p>
            </div>
          </div>
        </div>
      </div>

@endsection