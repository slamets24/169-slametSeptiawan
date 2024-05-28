<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\undangan;
use App\Models\story;

class StoryController extends Controller
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
        $undangan = Undangan::with('Story')->findOrFail($id);
        $story = null;
        $story = $undangan->story;

        return view('story', [
            'story' => $story,
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
            'judul' => 'required',
            'cerita' => 'required',
            'gambar' => 'required|mimes:jpeg,png,svg|max:2048'
        ]);
        $story = new Story();
        $story->idUndangan = $id;
        $story->judul = $request->post('judul');
        $story->cerita = $request->post('cerita');

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('img/stories');
            $story->gambar = $path;
        }
        $story->save();

        return redirect()->back()->with('success', 'Data Telah ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
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
            'judul' => 'required',
            'cerita' => 'required',
            'gambar' => 'nullable|mimes:jpeg,png,svg|max:2048'
        ]);

        $story = Story::findOrFail($id);
        $story->judul = $request->post('judul');
        $story->cerita = $request->post('cerita');

        if ($request->hasFile('gambar')) {

            if ($story->gambar) {
                \Storage::delete($story->gambar);
            }

            $path = $request->file('gambar')->store('img/stories');
            $story->gambar = $path;
        }

        $story->save();

        return redirect()->back()->with('success', 'Data Telah diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $story = Story::findOrFail($id);

        if ($story->gambar) {
            \Storage::delete($story->gambar);
        }

        $story->delete();

        return redirect()->back()->with('success', 'Data Telah dihapus');
    }
}
