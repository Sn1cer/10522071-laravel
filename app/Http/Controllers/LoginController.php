<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite; 
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback(Request $request)
    {
        // Menggunakan stateless() untuk menghindari InvalidStateException
        $user = Socialite::driver('google')->stateless()->user();

        // Mencari user berdasarkan email dan memastikan role-nya adalah Admin
        $existingUser = User::where('email', $user->email)
                            ->where('role', 'Admin')->first();

        if (!empty($existingUser)) {
            // Update data user menggunakan data terbaru dari Google
            $existingUser->update([
                'google_id' => $user->id, // <--- UBAH BAGIAN INI MENJADI $user->id
                'name' => $user->name,
                'avatar' => $user->avatar,
            ]);

            // Memulai session login untuk user tersebut
            Auth::login($existingUser);

            // Mengarahkan (redirect) ke halaman produk
            return redirect('/produk');
        } else {
            // Menampilkan halaman error 403 jika role bukan Admin atau email tidak ditemukan
            return abort(403);
        }
    }
}