<?php

namespace Darkin1\DigestAuth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class DigestAuthCreate
 * @package App\Classes
 */
class DigestAuthCreate
{

    /**
     * DigestAuthCreate constructor.
     */
    public function __construct()
    {
        $this->realm = config('digest-auth')['digest-realm'];
    }

    /**
     * @param Request $request
     * @return $this
     */
    public function make(Request $request)
    {
        return response('HTTP/1.0 401 Unauthorized', 401)
            ->header('WWW-Authenticate', 'Digest realm="' . $this->realm . '",qop="auth",nonce="' . uniqid() . '",opaque="' . md5($this->realm))
            ->withHeaders($request->headers->all());
    }
}
