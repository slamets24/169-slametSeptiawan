<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\undangan;

class HomeController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function show($id)
    {
        $undangan = Undangan::with(['MempelaiPria', 'MempelaiWanita', 'Acara', 'Story', 'Documentation'])
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
            'story' => $undangan->story
        ]);
    }
}
