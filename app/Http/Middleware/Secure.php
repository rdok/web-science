<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class Secure
{

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \Closure $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if ((App::environment('production') && $request->header('x-forwarded-proto') <> 'https') || !$request->secure())
		{
			return redirect()->secure($request->getRequestUri());
		}

		return $next($request);
	}

}
