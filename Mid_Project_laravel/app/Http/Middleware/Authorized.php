<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Authorized
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

      if(($request->session()->has('username'))|($request->session()->has('name')))
         return $next($request);
     else{
            session()->flash('msg4','At First ,You should do Login to Access this file!');
           return redirect()->route('adminLogin');}
    }
}
