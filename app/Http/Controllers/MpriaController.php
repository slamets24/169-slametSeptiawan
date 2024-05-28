<?php

namespace App\Http\Controllers;

use App\Models\mempelaiPria;
use App\Models\undangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MpriaController extends Controller
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

        $undangan = Undangan::with('MempelaiPria')->findOrFail($id);
        $mempelaiPria = $undangan->mempelaiPria;

        return view('mpria', [
            'mempelaiPria' => $mempelaiPria,
            'idUndangan' => $id,
            'id' => $id,
            'nPanggilPria' => $nPanggilPria,
            'nPanggilWanita' => $nPanggilWanita,
            'tittle' => 'undangan',
            'p' => 'pria'
        ]);
        // return view('mpria', compact('id', 'nPanggilPria', 'nPanggilWanita'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id)
    {
        $request->validate([
            'nmMempelaiPria' => 'required',
            'nmIbu' => 'required',
            'nmBapak' => 'required',
            'nRekening' => 'required',
            'noRek' => 'required'
        ]);

        $data = $request->only('nmMempelaiPria', 'nmIbu', 'nmBapak', 'nRekening', 'noRek');
        $data['idUndangan'] = $id;

        MempelaiPria::create($data);

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
            'nmMempelaiPria' => 'required',
            'nmIbu' => 'required',
            'nmBapak' => 'required',
            'nRekening' => 'required',
            'noRek' => 'required'
        ]);

        $data = $request->only('nmMempelaiPria', 'nmIbu', 'nmBapak', 'nRekening', 'noRek');

        $mempelaiPria = MempelaiPria::findOrFail($id);
        $mempelaiPria->update($data);

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
