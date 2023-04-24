<?php

namespace App\Http\Middleware;

use App\Models\Company;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class CheckCompanyLogin
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $user = User::where('email', $request->email)->first();
        $company = Company::find($user->company_id);

        if ($company->subscriptions->isEmpty()) {
            Session::flash('error','Fail Login , need active company');
          return  redirect()->route('login');
        }
        return $next($request);
    }
}
