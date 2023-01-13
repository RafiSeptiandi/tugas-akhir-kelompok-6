@extends('layout.template')
        <!-- START DATA -->
@section('konten')


        <div class="my-3 p-3 bg-body rounded shadow-sm">
                <!-- FORM PENCARIAN -->
                <div class="pb-3">
                  <div class="bg-dark text-white text-center p-3 fs-3">
                    Table Dosen
                  </div>
                </div>

                <!-- TOMBOL TAMBAH DATA -->
                <div class="pb-3">
                  <a href='{{ url('dosen/create') }}' class="btn btn-primary">+ Tambah Data</a>
                </div>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-1">No</th>
                            <th class="col-md-3">NIDN</th>
                            <th class="col-md-4">Nama</th>
                            <th class="col-md-2">Jabatan</th>
                            <th class="col-md-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nidn }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->jabatan }}</td>
                            <td>
                                <a href='{{ url('dosen/'.$item->nidn.'/edit')}}' class="btn btn-warning btn-sm">Edit</a>
                                <a href='' class="btn btn-danger btn-sm">Del</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

          </div>
          <!-- AKHIR DATA -->
@endsection
