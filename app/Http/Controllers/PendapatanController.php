<?php

namespace App\Http\Controllers;

use App\Models\Pendapatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendapatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pendapatan::all();
        return view('pendapatan.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pendapatan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pendapatan' => 'required',
            'nominal' => 'required',
            'bulan' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required',
        ]);

        $data = new Pendapatan();
        $data->user_id = Auth::user()->id;
        $data->nama_pendapatan = $request->nama_pendapatan;
        $data->nominal = $request->nominal;
        $data->tanggal = $request->tanggal;
        $data->bulan = $request->bulan;
        $data->keterangan = $request->keterangan;
        $data->save();
        return redirect()->route('pendapatan.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function rekomendasi(Request $request)
    {
        $nama = $request->nama_pendapatan;
        $tanggal = $request->tanggal;
        $gayaHidup = $request->gaya_hidup;
        $data = Pendapatan::where('nama_pendapatan',$nama)->where('tanggal',$tanggal)->first();
        return view('pendapatan.rekomendasi',compact('data','gayaHidup'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Pendapatan::where('id',$id)->first();
        return view('pendapatan.update',compact( 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_pendapatan' => 'required|string|max:255',
            'nominal' => 'required|numeric|min:0',
            'bulan' => 'required|string',
            'tanggal' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);

        $pendapatan = Pendapatan::findOrFail($id);

        $pendapatan->update([
            'nama_pendapatan' => $request->nama_pendapatan,
            'nominal' => $request->nominal,
            'bulan' => $request->bulan,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('pendapatan.index')->with('success', 'Data berhasil diperbarui.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Pendapatan::where('id',$id)->first();
        $data->delete();
        return redirect()->route('pendapatan.index')->with('success', 'Data berhasil dihapus');
    }
}
