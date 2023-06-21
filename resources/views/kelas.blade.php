@extends('layout.main')

@section('content')

    <div class="row px-3">
        <div class="col-lg-6 col-md-6 mb-4">
          <div class="card z-index-2 mb-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-info shadow-info border-radius-lg py-3">
                <div class="chart">
                    <h5 class="text-white px-5">Kelas</h5>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kelas</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jurusan</th>
                        <th class="text-secondary opacity-7"></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($kelas as $k)
                      <tr>
                        <td>
                          <h6 class="mb-0 text-sm">{{ $k->kelas }}</h6>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0">{{ $k->jurusan }}</p>
                        </td>
                        <td class="align-middle">
                          <a data-bs-toggle="modal" data-bs-target="#edit{{ $k->id }}" class="cursor-pointer text-secondary font-weight-bold text-xs">
                            Edit
                          </a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 mb-4">
          <div class="card z-index-2 mb-2">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-info shadow-info border-radius-lg py-3">
                <div class="chart">
                    <h5 class="text-white px-5">Tambah Kelas</h5>
                </div>
              </div>
            </div>
            <div class="card-body">
                <form method="POST" action="/kelas" role="form" class="text-start">
                  @csrf
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label">Kelas</label>
                    <input name="kelas" type="text" class="form-control" required>
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Jurusan</label>
                    <input name="jurusan" type="text" class="form-control" required>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-dark w-100 mb-2">Tambah Kelas</button>
                  </div>
                </form>
            </div>
          </div>
          @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible text-white" role="alert">
              <span class="text-sm">{{ session('success') }}</span>
              <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif
        </div>
      </div>

      <!-- Modal -->
      @foreach ($kelas as $k)
      <div class="modal fade" id="edit{{ $k->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Kelas</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="POST" action="/kelas/update" role="form" class="text-start">
                @csrf
                <input type="hidden" name="id" value="{{ $k->id }}">
                <div class="input-group input-group-outline my-3">
                  {{-- <label class="form-label">Kelas</label> --}}
                  <input name="kelas" value="{{ $k->kelas }}" type="text" class="form-control" required>
                </div>
                <div class="input-group input-group-outline mb-3">
                  {{-- <label class="form-label">Jurusan</label> --}}
                  <input name="jurusan" value="{{ $k->jurusan }}" type="text" class="form-control" required>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="text-center">
                      <button type="submit" class="btn bg-gradient-info w-100 mb-2">Update</button>
                    </div>
                  </div>
                  </form>
                  <div class="col-6">
                    <div class="text-center">
                      <form method="POST" action="/kelas/delete">
                        @method('delete')
                        @csrf
                        <input type="hidden" name="id" value="{{ $k->id }}">
                        <button type="submit" onclick="return confirm('Hapus kelas {{ $k->kelas }}?')" class="btn bg-gradient-danger w-100 mb-2">Delete</button>
                      </form>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach

@endsection