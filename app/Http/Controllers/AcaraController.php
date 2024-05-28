<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use App\Models\undangan;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAcaraRequest;
use App\Http\Requests\UpdateAcaraRequest;

class AcaraController extends Controller
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
        $undangan = Undangan::with('Acara')->findOrFail($id);
        $acara = $undangan->acara;
        $akad = null;
        $resepsi = null;

        if ($acara) {
            $akad = $acara->where('namaAcara', 'AKAD')->first();
            $resepsi = $acara->where('namaAcara', 'RESEPSI')->first();
        }

        return view('acara', [
            'resepsi' => $resepsi,
            'akad' => $akad,
            'acara' => $acara,
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
            'tglAcara' => 'required',
            'alamatLengkap' => 'required',
            'kecamatan' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'aMulai' => 'required',
            'aSelesai' => 'required',
            'linkGmaps' => 'required',
            'embedGmaps' => 'required'
        ]);

        $data = $request->only('tglAcara', 'alamatLengkap', 'kecamatan', 'kota', 'provinsi', 'aMulai', 'aSelesai', 'linkGmaps', 'embedGmaps');
        $data['idUndangan'] = $id;
        $data['namaAcara'] = $request->post('namaAcara');


        acara::create($data);

        return redirect()->back()->with('success', 'Data Telah ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Acara $acara)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Acara $acara)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tglAcara' => 'required',
            'alamatLengkap' => 'required',
            'aMulai' => 'required',
            'aSelesai' => 'required',
            'embedGmaps' => 'required'
        ]);
        $data = $request->only('tglAcara', 'alamatLengkap', 'aMulai', 'aSelesai', 'embedGmaps');
        //NOTE code dibawah. Sebenernya cara terstruktur dan mudah dipahami
        // $data['id'] = $request->post('id');
        // $acaras = acara::where('id', $data['id'])->update($data);

        $acara = Acara::findOrFail($id);
        $acara->update($data);

        return redirect()->back()->with('edit', 'Data Telah diEdit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Acara $acara)
    {
        //
    }
}
