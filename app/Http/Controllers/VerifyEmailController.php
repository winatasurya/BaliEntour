<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Models\User;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     *
     * @param  \Illuminate\Foundation\Auth\EmailVerificationRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request)
    {
        $user = User::find($request->route('id'));

        if (!$user) {
            return $this->invalidResponse('User tidak ditemukan.');
        }
        if (!hash_equals((string) $request->route('hash'), sha1($user->getEmailForVerification()))) {
            return $this->invalidResponse('Link verifikasi tidak valid.');
        }
        if ($user->hasVerifiedEmail()) {
            return $this->alreadyVerifiedResponse();
        }
        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }
        return redirect()->route('login')->with('success', 'Email berhasil diverifikasi. Silakan login.');
    }

    /**
     * Response for invalid verification attempt.
     *
     * @param string $message
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function invalidResponse($message)
    {
        return redirect()->route('login')
            ->with('error', $message);
    }

    public function notice(Request $request)
    {
        $email = $request->query('email');
        if (auth()->check() && auth()->user()->hasVerifiedEmail()) {
            return redirect()->route('dashboard');
        }
        return view('auth.verify-email', compact('email'));
    }

    public function resend(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->withErrors(['email' => 'User tidak ditemukan.']);
        }
        if ($user->hasVerifiedEmail()) {
            return redirect()->route('login')->with('success', 'Email sudah terverifikasi. Silakan login.');
        }
        $user->sendEmailVerificationNotification();
        return back()->with('success', 'Link verifikasi telah dikirim ulang.');
    }

    /**
     * Response for already verified email.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function alreadyVerifiedResponse()
    {
        return redirect()->route('login')
            ->with('info', 'Email sudah diverifikasi sebelumnya.');
    }

    /**
     * Response for successful verification.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function successResponse()
    {
        return redirect()->route('login')
            ->with('success', 'Email berhasil diverifikasi. Silakan login.');
    }
}