<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Undangan;
use App\Models\MempelaiPria;
use App\Models\MempelaiWanita;
use App\Models\Acara;
use App\Models\Story;
use App\Models\user;
use App\Models\role;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->idrole == '2') {
            return redirect()->back();
        } else {
            $undangan = Undangan::with(['user', 'MempelaiPria', 'MempelaiWanita', 'Acara', 'Story', 'Documentation'])
                ->get();
            $roles = role::all();
            $users = user::all();

            return view('admin.admin', [
                'undangan' => $undangan,
                'roles' => $roles,
                'users' => $users,

            ]);
        }
    }



    public function updatedPria(Request $request)
    {
        $request->validate([
            'nmMempelaiPria' => 'required',
            'nmIbu' => 'required',
            'nmBapak' => 'required',
            'nRekening' => 'required',
            'noRek' => 'required'
        ]);

        $data = $request->only('nmMempelaiPria', 'nmIbu', 'nmBapak', 'nRekening', 'noRek');

        $mempelaiPria = MempelaiPria::findOrFail($request->post('id'));
        $mempelaiPria->update($data);

        return redirect()->back()->with('success', 'Data Mempelai Pria Berhasil Di Edit');
    }

    public function updatedWanita(Request $request)
    {
        $request->validate([
            'nmMempelaiWanita' => 'required',
            'nmIbu' => 'required',
            'nmBapak' => 'required',
            'nRekening' => 'required',
            'noRek' => 'required'
        ]);

        $data = $request->only('nmMempelaiWanita', 'nmIbu', 'nmBapak', 'nRekening', 'noRek');

        $mempelaiWanita = mempelaiWanita::findOrFail($request->post('id'));
        $mempelaiWanita->update($data);

        return redirect()->back()->with('success', 'Data Mempelai Wanita Berhasil Di Edit');
    }

    public function updatedAcara(Request $request)
    {
        $request->validate([
            'tglAcara' => 'required',
            'alamatLengkap' => 'required',
            'aMulai' => 'required',
            'aSelesai' => 'required',
            'embedGmaps' => 'required'
        ]);
        $data = $request->only('tglAcara', 'alamatLengkap', 'aMulai', 'aSelesai', 'embedGmaps');

        $acara = Acara::findOrFail($request->post('id'));
        $acara->update($data);

        return redirect()->back()->with('success', 'Data Acara Di Edit');
    }

    public function showStory($id)
    {

        $story = Story::where('idUndangan', $id)->get();


        if ($story->isEmpty()) {
            return redirect()->back();
        } else {
            return view('admin.story', ['story' => $story]);
        }
    }

    public function updatedStory(Request $request, string $id)
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
                Storage::delete($story->gambar);
            }

            $path = $request->file('gambar')->store('img/stories');
            $story->gambar = $path;
        }

        $story->save();

        return redirect()->back()->with('success', 'Data Telah diperbarui');
    }

    public function storeUser(Request $request)
    {

        $request->validate([
            'username' => 'required|min:4',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4',
            'idrole' => 'required'
        ]);

        $data = $request->only('username', 'email', 'password', 'idrole');

        User::create($data);

        return redirect()->back()->with('success', 'User Berhasil Dibuat !!');
    }

    public function updatedUser(Request $request, string $id)
    {

        $request->validate([
            'username' => 'required|min:4',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4',
            'idrole' => 'required'
        ]);

        $data = $request->only('username', 'email', 'password', 'idrole');

        $user = User::findOrFail($id);
        $user->update($data);

        return redirect()->back()->with('success', 'User Berhasil DiUpdate !!');
    }

    public function deletedUser(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success', 'User Berhasil Dihapus !!');
    }

    public function deletedUndangan(string $id)
    {
        $undangan = Undangan::findOrFail($id);
        $undangan->delete();
        return redirect()->back()->with('success', 'Undangan Berhasil Dihapus !!');
    }
}
