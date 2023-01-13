@extends('layout.template')
<!-- START FORM -->
@section('konten')

<form action="{{ url('dosen') }}" method='post'>
@csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
    <a href="{{ url('dosen') }}" class="btn btn-secondary"><< kembali</a>

        <div class="mb-3 row">
            <label for="nidn" class="col-sm-2 col-form-label">NIDN</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='nidn' value="{{ Session::get('nidn') }}" id="nidn">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nama' value="{{ Session::get('nama') }}" id="nama">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='jabatan' value="{{ Session::get('jabatan') }}" id="jabatan">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="programstudi" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>
</div>
</form>
    <!-- AKHIR FORM -->
@endsection
