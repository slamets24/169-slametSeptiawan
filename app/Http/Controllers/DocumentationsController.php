<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Documentation;
use App\Models\Undangan;

class DocumentationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id, $nPanggilPria, $nPanggilWanita)
    {
        $undangan = Undangan::with('Documentation')->findOrFail($id);
        $documentation = $undangan->documentation;

        return view('dokumentasi', [
            'documentation' => $documentation,
            'idUndangan' => $id,
            'id' => $id,
            'nPanggilPria' => $nPanggilPria,
            'nPanggilWanita' => $nPanggilWanita
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id)
    {

        $request->validate([
            'fFormalPria' => 'required|mimes:jpeg,png,svg|max:2048',
            'fFormalWanita' => 'required|mimes:jpeg,png,svg|max:2048',
            'fWedding.*' => 'required|mimes:jpeg,png,svg|max:2048'
        ], [
            'fFormalPria.required' => 'Foto formal pria wajib diunggah.',
            'fFormalPria.mimes' => 'Foto formal pria harus berupa file bertipe: jpeg, png, svg.',
            'fFormalPria.max' => 'Ukuran foto formal pria maksimal 2MB.',
            'fFormalWanita.required' => 'Foto formal wanita wajib diunggah.',
            'fFormalWanita.mimes' => 'Foto formal wanita harus berupa file bertipe: jpeg, png, svg.',
            'fFormalWanita.max' => 'Ukuran foto formal wanita maksimal 2MB.',
            'fWedding.*.required' => 'Foto wedding wajib diunggah.',
            'fWedding.*.mimes' => 'Foto wedding harus berupa file bertipe: jpeg, png, svg.',
            'fWedding.*.max' => 'Ukuran foto wedding maksimal 2MB per file.'
        ]);

        $documentation = new documentation();
        $documentation->idUndangan = $id;

        if ($request->hasFile('fFormalPria')) {
            $path = $request->file('fFormalPria')->store('img/formal_pria');
            $documentation->fFormalPria = $path;
        }

        if ($request->hasFile('fFormalWanita')) {
            $path = $request->file('fFormalWanita')->store('img/formal_wanita');
            $documentation->fFormalWanita = $path;
        }

        if ($request->hasFile('fWedding')) {
            $weddingPaths = [];
            foreach ($request->file('fWedding') as $file) {
                $path = $file->store('img/wedding');
                $weddingPaths[] = $path;
            }
            $documentation->fWedding = json_encode($weddingPaths); // Simpan sebagai JSON array
        }

        $documentation->save();
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
            'fFormalPria' => 'required|mimes:jpeg,png,svg|max:2048',
            'fFormalWanita' => 'required|mimes:jpeg,png,svg|max:2048',
            'fWedding.*' => 'required|mimes:jpeg,png,svg|max:2048'
        ]);

        $documentation = Documentation::findOrFail($id);

        if ($request->hasFile('fFormalPria')) {
            // Hapus file lama jika ada
            if ($documentation->fFormalPria) {
                Storage::delete($documentation->fFormalPria);
            }
            $path = $request->file('fFormalPria')->store('img/formal_pria');
            $documentation->fFormalPria = $path;
        }

        if ($request->hasFile('fFormalWanita')) {
            // Hapus file lama jika ada
            if ($documentation->fFormalWanita) {
                Storage::delete($documentation->fFormalWanita);
            }
            $path = $request->file('fFormalWanita')->store('img/formal_wanita');
            $documentation->fFormalWanita = $path;
        }

        if ($request->hasFile('fWedding')) {
            // Hapus file lama jika ada
            if ($documentation->fWedding) {
                $oldWeddingPaths = json_decode($documentation->fWedding);
                foreach ($oldWeddingPaths as $oldPath) {
                    Storage::delete($oldPath);
                }
            }
            $weddingPaths = [];
            foreach ($request->file('fWedding') as $file) {
                $path = $file->store('img/wedding');
                $weddingPaths[] = $path;
            }
            $documentation->fWedding = json_encode($weddingPaths); // Simpan sebagai JSON array
        }

        $documentation->save();
        return redirect()->back()->with('success', 'Data Telah diEdit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
