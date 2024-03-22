<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function candidateCreate(): View
    {
        return view('auth.candidateLogin');
    }

    public function companyCreate(): View
    {
        return view('auth.companyLogin');
    }

    public function selectUser()
    {
        return view('auth.selectrole');
    }
    /**
     * Handle an incoming authentication request.
     */

    public function candidateStore(LoginRequest $request)
    {
        $request->authenticate();
        $request->session()->regenerate();

        if ($request->user()->role === 'candidate') {
            return redirect()->route('candidate.dashboard');
        } else {
            Auth::guard('web')->logout();
            return redirect('/select-user')->with(['status' => 'You Cant Login As a Candidate! You Have No Candidate Account Please Login From Your Spechific Role']);
        }
    }

    public function companyStore(LoginRequest $request)
    {
        $request->authenticate();
        $request->session()->regenerate();

        if ($request->user()->status === 'inactive') {
            Auth::guard('web')->logout();
            return redirect('/company-login')->with(['status' => 'Your Account Not Approved Yet. After Verification Complete You Will be Notified Within 24 Hours In Your Registered Email Address.']);
        }

        if ($request->user()->role === 'company') {
            return redirect()->route('company.dashboard');
        } else {
            Auth::guard('web')->logout();
            return redirect('/select-user')->with(['status' => 'You Cant Login As a Company! You Have No Company Account Please Login From Your Spechific Role']);
        }
    }

    public function adminStore(LoginRequest $request)
    {
        $request->authenticate();
        $request->session()->regenerate();

        if ($request->user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            Auth::guard('web')->logout();
            return redirect('/select-user')->with(['status' => 'You Cant Login As a Admin! You Have No Admin Account Please Login From Your Spechific Role']);
        }
    }


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
