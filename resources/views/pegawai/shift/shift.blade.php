@extends('layout.app')
{{-- @section('title-body', 'List Shift') --}}

@push('style')


{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css"> --}}
{{-- <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" /> --}}

@endpush
@section('konten-header')
<div class="section-header">
  <h1>List Shift</h1>
</div>
@endsection
@section('konten-main')

    <div class="row">
        <div class="col-md-8">
          <div class="card card-primary">
            <div class="card-header">
                <h4>Tabel Data Shift</h4>
          </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                  <thead>
                    <tr>
                      <th class="text-center">#</th>
                      <th>Shift</th>
                      <th>Waktu mulai</th>
                      <th>Waktu Akhir</th>
                      <th>Aksi</th>
                      
                    </tr>
                  </thead>
                  <tbody>

                    @foreach($shift as $no=>$data)
                    <tr>
                        <td>{{ $no+1 }}</td>
                        <td>{{ $data->shift }}</td>
                        <td>{{ $data->waktu_mulai }}</td>
                        <td>{{ $data->waktu_akhir }}</td>
                        <td class="d-flex align-items-center">
                            <a href="{{ route('shift.edit', $data->id) }}" class="btn btn-warning btn-sm me-2 mr-2 ">Edit</a>    
                            <form action="{{ route('shift.delete', $data->id) }}" method="post"  onsubmit="return confirm('Yakin ingin menghapus data?')">
                              @csrf
                              @method('delete')
                              <button class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Tambah Data Shift</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('shift.post') }}" method="post">
                        @csrf
                        <label for="">Shift</label>
                        <input type="text" name="shift" class="form-control mb-2">
                        <label for="">Waktu Mulai</label>
                        <input type="time" name="waktu_mulai" class="form-control mb-2">
                        <label for="">Waktu Akhir</label>
                        <input type="time" name="waktu_akhir" class="form-control mb-2">
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary mt-2">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
  

@endsection

@push('scripts')

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script> --}}
{{-- <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script> --}}

<script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>

{{-- <script>

  $(document).ready( function () {
    $('#table-2').DataTable();
  } );
</script> --}}
   



@endpush