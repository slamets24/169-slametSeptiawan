<?php

namespace App\Http\Controllers;

use App\Models\mempelaiWanita;
use Illuminate\Http\Request;
use App\Models\undangan;

class MwanitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id, $nPanggilPria, $nPanggilWanita)
    {


        $undangan = Undangan::with('MempelaiWanita')->findOrFail($id);
        $mempelaiWanita = $undangan->mempelaiWanita;

        return view('mWanita', [
            'mempelaiWanita' => $mempelaiWanita,
            'idUndangan' => $id,
            'id' => $id,
            'nPanggilPria' => $nPanggilPria,
            'nPanggilWanita' => $nPanggilWanita
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'nmMempelaiWanita' => 'required',
            'nmIbu' => 'required',
            'nmBapak' => 'required',
            'nRekening' => 'required',
            'noRek' => 'required'
        ]);

        $data = $request->only('nmMempelaiWanita', 'nmIbu', 'nmBapak', 'nRekening', 'noRek');
        $data['idUndangan'] = $id;

        mempelaiWanita::create($data);

        return redirect()->back()->with('success', 'Data Telah ditambahkan');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nmMempelaiWanita' => 'required',
            'nmIbu' => 'required',
            'nmBapak' => 'required',
            'nRekening' => 'required',
            'noRek' => 'required'
        ]);

        $data = $request->only('nmMempelaiWanita', 'nmIbu', 'nmBapak', 'nRekening', 'noRek');

        $mempelaiWanita = MempelaiWanita::findOrFail($id);
        $mempelaiWanita->update($data);

        return redirect()->back()->with('edit', 'Data Telah diEdit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
