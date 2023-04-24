<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class AdminCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = null;
        if(Session::has('loginId')){
            $user = User::where('id', Session::get('loginId'))->first();
        }

        if(!Session::has('loginId') || (Session::has('loginId') && $user->role != 1)){
            return redirect('login')->with('fail', "You don't have permission to access this page");
        }
        return $next($request);
    }
}
