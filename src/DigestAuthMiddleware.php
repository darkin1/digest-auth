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
        if (!$this->digestAuthService->getDigest()) {
            $dg = new DigestAuthCreate();

            return $dg->make($request);
        }

        $config = config('digest-auth');

        if ($config['driver'] == 'env' && !$this->digestAuthService->isValidEnv()) {
            return $this->digestAuthService->unauthorized($request);
        }

        if ($config['driver'] == 'db' && !$this->digestAuthService->isValidDb()) {
            return $this->digestAuthService->unauthorized($request);
        }

        return $next($request);
    }
}
