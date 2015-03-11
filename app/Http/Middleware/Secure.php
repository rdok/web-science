<?php namespace App\Http\Middleware;

use Closure;

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
		// see http://stackoverflow.com/a/25095936
		if (($request->header('x-forwarded-proto') <> 'https'))
		{
			return redirect()->secure($request->getRequestUri());
		}

		return $next($request);
	}

}
