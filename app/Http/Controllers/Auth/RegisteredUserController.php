<?php

namespace App\Http\Controllers\Auth;


use App\Models\User;
use Illuminate\View\View;
use App\Models\PendingUser;
use Illuminate\Http\Request;
use App\Mail\VerificationMail;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;

class RegisteredUserController extends Controller
{

    public function create(): View
    {
        return view('auth.register');
    }


    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Menyimpan data pengguna ke tabel pending_users
        $pending_user = new PendingUser();
        $pending_user->name = $request->name;
        $pending_user->email = $request->email;
        $pending_user->password = bcrypt($request->password);
        $pending_user->verification_expires_at = Carbon::now()->addMinutes(1); // Tentukan waktu kadaluwarsa link verifikasi
        $pending_user->save();


        Mail::to($pending_user->email)->send(new VerificationMail($pending_user));


        return redirect()->route('verification.instruction', ['id' => $pending_user->id]);
    }


    public function verifyEmail($id, $hash)
    {

        Log::info('Verifying email for user: ' . $id . ' with hash: ' . $hash);
        $pendingUser = PendingUser::findOrFail($id);

        if (sha1($pendingUser->email) === $hash) {

            if (Carbon::now()->gt($pendingUser->verification_expires_at)) {

                $pendingUser->delete();


                return redirect()->route('register')->withErrors(['email' => 'Link verifikasi sudah kedaluwarsa.']);
            }


            $user = User::create([
                'name' => $pendingUser->name,
                'email' => $pendingUser->email,
                'password' => $pendingUser->password,
                'email_verified_at' => now(),
            ]);


            $pendingUser->delete();


            return redirect()->route('login')->with('success', 'Email Anda berhasil diverifikasi, silakan login.');
        }


        return redirect()->route('register')->withErrors(['email' => 'Link verifikasi tidak valid.']);
    }

}
