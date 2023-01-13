@extends('layout.template')
<!-- START FORM -->
@section('konten')

<form action="{{url('mahasiswa')}}" method='post'>
    @csrf
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href="{{ url('mahasiswa') }}" class="btn btn-secondary"><< kembali</a>
            <div class="mb-3 row">
                <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name='nim' value="{{ Session::get
                    ('nim')}}" id="nim">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nama' value="{{ Session::get
                        ('nama')}}" id="nama">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jurusan_id" class="col-sm-2 col-form-label">Jurusan</label>
                <div class="col-sm-10">
                    <select class="form-control" name="jurusan_id" aria-label="Default select example">
                    @foreach($jurusan as $item)
                        <option class="form-control" selected value="{{ $item->id}}">{{$item->name}}</option>
                    @endforeach
                    </select>
                </div>
            </div>
        <div class="mb-3 row">
            <label for="dosen_id" class="col-sm-2 col-form-label">Dosen Pembimbing</label>
            <div class="col-sm-10">
                <select class="form-control" name="dosen_id" aria-label="Default select example">
                @foreach($dosen as $item)
                    <option class="form-control" selected value="{{ $item->id}}">{{$item->nama}}</option>
                @endforeach
                </select>
            </div>
        </div>
            <div class="mb-3 row">
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
            </div>
</select>
        </div>
    </form>
        <!-- AKHIR FORM -->
        @endsection
