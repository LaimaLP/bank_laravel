<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Roles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $roles): Response
    {

        $user = $request->user();
        
        if(!$user){
            return redirect()->route('login')->with('info', "Only logged-in users can see the information. ADMIN role: admin@gmail.com , USER role: user@gmail.com. Password: 123.");
        }
        if(!in_array($user->role, explode('|', $roles))){
            return abort(418, 'Tea spot');
        }

        // $roles = explode('|', $roles);

        return $next($request);


    }
}
