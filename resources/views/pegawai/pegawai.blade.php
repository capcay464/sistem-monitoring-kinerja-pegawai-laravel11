@extends('layout.app')
{{-- @section('title-body', 'List Pegawai') --}}

@push('style')
  
  <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />

@endpush

@section('konten-header')
<div class="section-header" >
  <h1>List Pegawai</h1>
</div>
@endsection

@section('konten-main')

    <div class="row">
        <div class="col-12">
          <div class="card card-primary">
            <div class="card-header">
                <h4>Tabel Data Pegawai</h4>
                <div class="card-header-action">
                  <a class="btn btn-success" href="{{ route('pegawai.tambah') }}"><i class="fa fa-plus"></i> Tambah Data</a>
                </div>
          </div>
            <div class="card-body">
              {{-- <div class="d-flex justify-content-start">
                <a href="" class="btn btn-sm btn-success"><b>+</b> Tambah Data</a>
            </div> --}}
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                  <thead>
                    <tr>
                      <th class="text-center">
                        #
                      </th>
                      <th>NIP</th>
                      <th>Nama Pegawai</th>
                      <th>Alamat</th>
                      {{-- <th>Gender</th> --}}
                      {{-- <th>Tanggal Lahir</th> --}}
                      <th>Jabatan</th>
                      <th>Bagian</th>
                      <th>Shift</th>
                      {{-- <th>Foto</th> --}}
                      <th>Aksi</th>
                      
                    </tr>
                  </thead>
                  <tbody>

                    @foreach($pegawai as $no=>$data)
                    <tr>
                        <td class="text-center">{{ $no+1 }}</td>
                        <td>{{ $data->nip }}</td>
                        <td>{{ $data->nama_pegawai }}</td>
                        <td>{{ $data->alamat }}</td>
                        {{-- <td>{{ $data->gender }}</td> --}}
                        {{-- <td class="text-center">{{ $data->tgl_lahir }}</td> --}}
                        <td>{{ $data->jabatan->jabatan }}</td>
                        <td>{{ $data->bagian->bagian }}</td>
                        <td>{{ $data->shift->shift }}</td>
                        {{-- <td>{{ $data->foto }}</td> --}}
                        <td class="d-flex align-items-center" style="width: 50px;">
                            <a href="{{ route('pegawai.edit', $data->id) }}" class="btn btn-warning btn-sm me-2 mr-2 ">Edit</a>
                            <form action="{{ route('pegawai.delete', $data->id) }}" method="post"  onsubmit="return confirm('Yakin ingin menghapus data?')">
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
      </div>
  


@endsection

@push('scripts')

<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
{{-- <script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script> --}}

<script>

  $(document).ready( function () {
    $('#table-1').DataTable();
  } );
</script>

@endpush