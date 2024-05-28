<?php

namespace App\Http\Controllers;

use App\Models\undangan;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//Note. Dasboard ==== UNDANGAN

class DasboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('undangan');
    }

    public function userInvitationsCount()
    {
        $user = Auth::user();
        $undangan = Undangan::where('idUser', $user->id)->get();
        $count = $undangan->count();
        return view('/undangan', compact('count', 'undangan'));
    }

    public function deleteUserInvitations(string $id)
    {
        $user = Auth::user();
        Undangan::where('id', $id)->where('idUser', $user->id)->delete();

        return redirect('undangan')->with('success', 'All invitations have been deleted.');
    }
}
