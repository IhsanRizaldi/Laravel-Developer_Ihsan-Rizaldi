<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pengeluaran::orderBy('tanggal','asc')->get();
        return view('pengeluaran.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengeluaran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'nominal' => 'required|array',
        'bulan' => 'required',
        'tanggal' => 'required|date',
    ]);

    $user_id = Auth::user()->id;

    foreach ($request->nominal as $jenis => $nominals) {
        foreach ($nominals as $nominal) {
            Pengeluaran::create([
                'user_id' => $user_id,
                'nominal' => $nominal,
                'bulan' => $request->bulan,
                'tanggal' => $request->tanggal,
                'jenis' => $jenis,
            ]);
        }
    }

    return redirect()->route('pengeluaran.index')->with('success', 'Data pengeluaran berhasil disimpan');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Pengeluaran::where('id',$id)->first();
        return view('pengeluaran.update', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nominal' => 'required',
            'bulan' => 'required',
            'tanggal' => 'required|date',
            'jenis' => 'required'
        ]);
        $pengeluaran = Pengeluaran::find($id);
        $pengeluaran->update($request->all());
        return redirect()->route('pengeluaran.index')->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Pengeluaran::where('id',$id)->first();
        $data->delete();
        return redirect()->route('pengeluaran.index')->with('success', 'Data berhasil dihapus');
    }
}
