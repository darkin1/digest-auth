<?php

namespace Darkin1\DigestAuth;

/**
 * Class DigestAuthCreate
 * @package App\Classes
 */
class DigestAuthCreate
{

    /**
     * DigestAuthCreate constructor.
     * @param $realm
     */
    public function __construct($realm)
    {
        $this->realm = $realm;
    }

    /**
     *
     */
    public function make($response)
    {
        return response('HTTP/1.0 401 Unauthorized', 401)
            ->header('WWW-Authenticate', 'Digest realm="' . $this->realm . '",qop="auth",nonce="' . uniqid() . '",opaque="' . md5($this->realm))
            ->withHeaders($response->headers->all());
    }
}
