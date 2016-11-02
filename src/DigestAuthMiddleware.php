<?php

namespace Darkin1\DigestAuth;

use Closure;

class DigestAuthMiddleware
{
    /**
     * @var DigestAuth
     */
    private $digestAuthService;

    /**
     * @var DigestAuthCreate
     */
    private $digestAuthCreateService;

    /**
     * DigestAuth constructor.
     * @param DigestAuth $digestAuthService
     * @param DigestAuthCreate $digestAuthCreateService
     */
    public function __construct(DigestAuth $digestAuthService, DigestAuthCreate $digestAuthCreateService)
    {
        $this->digestAuthService = $digestAuthService;
        $this->digestAuthCreateService = $digestAuthCreateService;
    }


    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if (!$this->digestAuthService->getDigest()) {
            $dg = $this->digestAuthCreateService(env('DIGEST_REALM'));
            return $dg->make($response);
        }

        if (!$this->digestAuthService->isValidDB()) {
            return response('HTTP/1.0 401 Unauthorized', 401)
                ->withHeaders($response->headers->all());
        }

        return $response;
    }
}
