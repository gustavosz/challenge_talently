<?php

namespace Tests\Concerns;

use Core\Backoffice\Auth\Infrastructure\Persistence\Eloquent\AuthUserEloquentModel;
use Tymon\JWTAuth\Facades\JWTAuth;

trait AttachJwtToken
{
    protected $loginUser;

    public function loginAs(AuthUserEloquentModel $user = null)
    {
        $this->loginUser = $user;

        return $this;
    }

    protected function getJwtToken()
    {
        $user = $this->loginUser ?: AuthUserEloquentModel::factory()->create();

        return JWTAuth::fromUser($user);
    }

    /**
     * @param string $method
     * @param string $uri
     * @param array $parameters
     * @param array $cookies
     * @param array $files
     * @param array $server
     * @param string $content
     * @return \Illuminate\Http\Response
     */
    public function call($method, $uri, $parameters = [], $cookies = [], $files = [], $server = [], $content = null)
    {
        if ($this->requestNeedsToken($method, $uri)) {
            $server = $this->attachToken($server);
        }

        return parent::call($method, $uri, $parameters, $cookies, $files, $server, $content);
    }

    protected function requestNeedsToken($method, $uri)
    {
        return !('/auth/login' === $uri && 'POST' === $method);
    }

    protected function attachToken(array $server)
    {
        return array_merge($server, $this->transformHeadersToServerVars([
            'Authorization' => 'Bearer ' . $this->getJwtToken(),
        ]));
    }
}
