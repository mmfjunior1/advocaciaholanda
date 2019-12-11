<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class Https {

    public function handle($request, Closure $next)
    {
            
            //var_dump(isset($_SERVER['HTTPS']));die;
            if (!$request->secure()) {
              //  return redirect()->secure($request->getRequestUri());
            }

            return $next($request); 
    }
}
