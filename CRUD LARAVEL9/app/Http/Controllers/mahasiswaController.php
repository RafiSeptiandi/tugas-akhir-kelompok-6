<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\dosen;
use App\Models\JurusanModel;
class mahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = mahasiswa::all();

        return view('mahasiswa.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = mahasiswa::all();
        $dosen = dosen::all();
        $jurusan = JurusanModel::all();
        return view('mahasiswa.create',[
            'data'=>$data,
            'dosen'=>$dosen,
            'jurusan'=>$jurusan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $a=[
            'nim'=>'required|numeric|unique:mahasiswa,nim',
            'nama'=>'required',
            'jurusan_id'=>'required',
            'dosen_id'=>'required'
        ];
        $b=[
            'nim.required'=>'NIM WAJIB DIISI!!',
            'nim.numeric'=>'NIM WAJIB DALAM ANGKA!!',
            'nim.unique'=>'NIM SUDAH ADA DI DATABASE!!',
            'nama.required'=>'NAMA WAJIB DIISI!!',
            'jurusan_id.required'=>'JURUSAN WAJIB DIISI!!',
            'dosen_id.required'=>'diperlukan'
        ];
        $validasi=$request->validate($a,$b);
        mahasiswa::create($validasi);
        return redirect()->to('mahasiswa')->with('success', 'Berhasil Menambahkan data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jurusan = JurusanModel::all();
        $data = mahasiswa::where('nim',$id)->first();
        return view('mahasiswa.edit')->with([
            'data'=>$data,
            'jurusan'=>$jurusan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'=>'required',
            'jurusan_id'=>'required',
        ],[
            'nama.required'=>'NAMA WAJIB DIISI!!',
            'jurusan_id.required'=>'JURUSAN WAJIB DIISI!!',
        ]);
        $data = [
          'nama'=>$request->nama,
          'jurusan_id'=>$request->jurusan_id,
        ];
        mahasiswa::where('nim',$id)->update($data);
        return redirect()->to('mahasiswa')->with('success', 'Berhasil melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        mahasiswa::where('nim',$id)->delete();
        return redirect()->to('mahasiswa')->with('hapus', 'Berhasil Melakukan Penghapusan Data');
    }
}
