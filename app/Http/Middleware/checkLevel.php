<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $level = array_slice(func_get_args(),2);
        foreach($level as $level){
            $user = \Auth::user()->level;
            // $user = \Auth::user()->level=masyarakat;
            if ($user == $level){
                return $next($request);
            }
            else {
                return redirect('/home');
            }
        }
    }
}