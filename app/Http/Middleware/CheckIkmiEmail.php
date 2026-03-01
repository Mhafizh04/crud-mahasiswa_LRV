<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckIkmiEmail
{
    public function handle(Request $request, Closure $next): Response
    {
        // cek user login
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // cek email harus @ikmi.ac.id
        if (!str_ends_with(auth()->user()->email, '@ikmi.ac.id')) {
            return redirect()->back()
                ->with('error', 'Hanya email IKMI yang boleh menghapus data!');
        }

        return $next($request);
    }
}
