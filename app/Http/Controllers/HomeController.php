<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\undangan;
use App\Models\Ucapan;

class HomeController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function show($id)
    {
        $undangan = Undangan::with(['MempelaiPria', 'MempelaiWanita', 'Acara', 'Story', 'Documentation', 'ucapan'])
            ->where('id', $id)->first();

        $fWedding = json_decode($undangan->documentation->fWedding, true);

        return view('dino.dino', [
            // 'resepsi' => $resepsi,
            'undangan' => $undangan,
            'mPria' => $undangan->MempelaiPria,
            'mWanita' => $undangan->MempelaiWanita,
            'acara' => $undangan->Acara,
            'doc' => $undangan->Documentation,
            'fWedding' => $fWedding,
            'ucapan' => $undangan->ucapan,
            'story' => $undangan->story
        ]);
    }

    public function storeUcapan(Request $request, string $id)
    {

        $request->validate([
            'nama' => 'required|min:4',
            'alamat' => 'required|min:4',
            'ucapan' => 'required|min:4'
        ]);

        $data = $request->only('nama', 'alamat', 'ucapan');
        $data['idUndangan'] = $id;
        Ucapan::create($data);

        return redirect()->back();
    }
}
