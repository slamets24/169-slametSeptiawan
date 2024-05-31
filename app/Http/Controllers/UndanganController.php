<?php

namespace App\Http\Controllers;

use App\Models\undangan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UndanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id, $nPanggilPria, $nPanggilWanita)
    {
        $undangan = Undangan::with(['MempelaiPria', 'MempelaiWanita', 'Acara', 'Story', 'Documentation', 'ucapan'])
            ->where('id', $id)->first();

        $cek = !empty($undangan->MempelaiPria) && !empty($undangan->MempelaiWanita) && !empty($undangan->Acara) && !empty($undangan->Story) && !empty($undangan->Documentation) && !empty($undangan->ucapan);

        return view('dasboard', compact('id', 'nPanggilPria', 'nPanggilWanita', 'cek'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *Controller Untuk membuat undangan
     */
    public function store(Request $request)
    {
        $request->validate([
            'nPanggilPria' => 'required|min:4',
            'nPanggilWanita' => 'required|min:4',
            'judulUndangan' => 'required'
        ]);
        $data = $request->only('nPanggilPria', 'nPanggilWanita', 'judulUndangan');
        // $data['judulUndangan'] = $request->post('judulUndangan');
        $data['idUser'] = Auth::id();
        Undangan::create($data);
        return redirect()->back();
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
