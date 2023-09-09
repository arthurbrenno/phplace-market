<?php

namespace Abwel\Phplace\Http;

class Request {

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
     * @var array $headers
     */
    private $headers;

    public function __construct() {
        $this->httpMethod  = $_SERVER['REQUEST_METHOD'];
        $this->uri         = $_SERVER['REQUEST_URI'];
        $this->queryParams = $_GET;
        $this->postVars    = $_POST;
        $this->headers     = getallheaders();
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