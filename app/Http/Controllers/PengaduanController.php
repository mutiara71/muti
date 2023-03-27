<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengaduan = Pengaduan::all();
        return view('pengaduan.index')->with('pengaduan',$pengaduan);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengaduan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => ['required'],
            'nama' => ['required','string', 'max:255'],
            'isi_laporan' => ['required', 'string']
        ]);
        
        try {
            $pengaduan = new Pengaduan();
            $pengaduan->user_id = Auth::user()->id;
            $pengaduan->nama = $request->nama;
            $pengaduan->isi_laporan = $request->isi_laporan;
            // $pengaduan->status = 'diterima';
            $pengaduan->save();
        }
        catch(\Exception $e) {
            return redirect()->back->withErrors(['Pengaduan gagal terkirim']);
        }
        return redirect('pengaduan')->with('status','Pengaduan terkirim');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $pengaduan = Pengaduan::findOrFail($id);
            $pengaduan->delete();
       }
        catch(\Exception $e ){
            return redirect()->back()->withErrors(['Pengaduan gagal dihapus']);
       }
        return redirect()->back()->with('status','Pengaduan berhasil dihapus');
    }
}