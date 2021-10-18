<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifiedClub
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user()->club_id == "1") {
            // abort(403, 'Accès interdit');
            if (strlen($request->user()->clubRequests) == 2) {
                return redirect()->route('dashboard')->withErrors(['club' => 'Rejoignez d\'abord un club.']);
            } else {
                return redirect()->route('dashboard')->withErrors(['club' => 'Votre demande est en attente de validation.']);
            }
        } else {
            return $next($request);
        }
    }
}
