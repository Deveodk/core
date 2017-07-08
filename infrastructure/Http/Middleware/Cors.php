<?php namespace Infrastructure\Http\Middleware;

use Closure;

class Cors
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!app()->environment('testing')) {
            header("Access-Control-Allow-Origin: *");
            // ALLOW OPTIONS METHOD
            $headers = [
                'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
                'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin, X-Requested-With, Authorization',
                'Access-Control-Expose-Headers' => 'Authorization'
            ];
            if ($request->getMethod() == "OPTIONS") {
                // The client-side application can set only headers allowed in Access-Control-Allow-Headers
                return response()->json('OK', 200, $headers);
            }

            $response = $next($request);

            foreach ($headers as $key => $value) {
                $response->header($key, $value);
            }
            return $response;
        }
        return $next($request);
    }
}
