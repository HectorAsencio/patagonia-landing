<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Notificacion;

class Notifications
{
    public function handle($request, Closure $next)
    {
        // Perform action
        if (Auth::check()) {
            $nNotificacionesPorResponder = Notificacion::where('receptor_id', Auth::id())->where('estado', 'Nueva')->count();
            View::share('nNotificacionesPorResponder', $nNotificacionesPorResponder);
        }

        return $next($request);
    }
}