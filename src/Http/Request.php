<?php

namespace Abwel\Phplace\Http;

class Request {

    private $router;

    /**
     * @var string $httpMethod
     */
    private $httpMethod;

    /**
     * @var string $uri
     */
    private $uri;

    /**
     * $_GET[]
     * @var array $queryParams
     */
    private $queryParams;

    /**
     * $_POST[]
     * @var array $postVars
     */
    private $postVars;

    /**
     * Header params
     * @var array|false $headers
     */
    private $headers;

    public function __construct($router) {
        $this->router      = $router;
        $this->httpMethod  = $_SERVER['REQUEST_METHOD'] ?? [];
        $this->queryParams = $_GET ?? [];
        $this->postVars    = $_POST ?? [];
        $this->headers     = getallheaders();
        self::setUri();
    }

    private function setUri() {
        $this->uri         = $_SERVER['REQUEST_URI'] ?? [];
        $xURI = explode('?', $this->uri);
        $this->uri = $xURI[0];
    }

    public function getRouter() {
        return $this->router;
    }

    public function getHttpMethod() {
        return $this->httpMethod;
    }

    public function getUri() {
        return $this->uri;
    }

    public function getHeaders() {
        return $this->headers;
    }

    public function getQueryParams() {
        return $this->queryParams;
    }

    public function getPostVars() {
        return $this->postVars;
    }
}