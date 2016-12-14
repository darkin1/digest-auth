<?php

namespace Darkin1\DigestAuth;

use Closure;
use Illuminate\Http\Request;

class DigestAuthMiddleware
{
    /**
     * @var DigestAuth
     */
    private $digestAuthService;

    /**
     * DigestAuth constructor.
     * @param DigestAuth $digestAuthService
     */
    public function __construct(DigestAuth $digestAuthService)
    {
        $this->digestAuthService = $digestAuthService;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (! $this->digestAuthService->getDigest()) {
            $dg = new DigestAuthCreate();

            return $dg->make($request);
        }

        if (! $this->digestAuthService->isValidDB()) {//todo: config field
            return response('HTTP/1.0 401 Unauthorized', 401)
                ->withHeaders(['WWW-Authenticate' => $request->headers->get('Authorization')]);
        }

        return $next($request);
    }
}
