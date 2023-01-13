<?php

namespace App\Http\Controllers;

use App\Models\dosen;
use App\Models\mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class dosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = dosen::all();

        return view('dosen.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = dosen::all();
        return view('dosen.create',[
            'data'=>$data
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
            'nidn'=>'required|numeric|unique:dosen,nidn',
            'nama'=>'required',
            'jabatan'=>'required',
        ];
        $b=[
            'nidn.required'=>'NIDN WAJIB DIISI!!',
            'nidn.numeric'=>'NIDN WAJIB DALAM ANGKA!!',
            'nidn.unique'=>'NIDN SUDAH ADA DI DATABASE!!',
            'nama.required'=>'NAMA WAJIB DIISI!!',
            'jabatan.required'=>'JABATAN WAJIB DIISI!!',
        ];
        $validasi = $request->validate($a,$b);
        dosen::create($validasi);
        return redirect()->to('dosen')->with('success', 'Berhasil Menambahkan data');
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
        $data = dosen::where('nidn',$id)->first();
        return view('dosen.edit')->with('data', $data);
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
            'jabatan'=>'required',
        ],[
            'nama.required'=>'NAMA WAJIB DIISI!!',
            'jabatan.required'=>'JABATAN WAJIB DIISI!!',
        ]);
        $data = [
          'nama'=>$request->nama,
          'jabatan'=>$request->jabatan,
        ];
        dosen::where('nidn',$id)->update($data);
        return redirect()->to('dosen')->with('success', 'Berhasil update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
