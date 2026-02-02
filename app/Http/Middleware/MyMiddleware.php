<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Session\TokenMismatchException;


class MyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
       public function handle(Request $request, Closure $next): Response
    {
        // قراءة الهيدر
        // $headerToken = $request->header('X-CSRF-TOKEN');

        // // قراءة التوكن المخزن في السيشن
        // // $sessionToken = $request->session()->token();

        // // إذا لم يتم إرسال الهيدر أو كان غير مطابق
        // //   if (!$headerToken || $headerToken !== $sessionToken) {
        // //     throw new TokenMismatchException; // هذا ما يجعل Laravel يرجّع 419
        // // }
        // if (!$headerToken ) {
        //     throw new TokenMismatchException; // هذا ما يجعل Laravel يرجّع 419
        // }

        return $next($request);
    }

}
