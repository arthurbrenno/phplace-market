<?php

namespace Abwel\Phplace\Http;

class Request {

    /**
     * @var Router Roteador da request.
     */
    private Router $router;

    /**
     * @var string metodo utilizado
     */
    private string $httpMethod;

    /**
     * @var string $uri
     */
    private string $uri;

    /**
     * $_GET[]
     * @var array $parametersGETMethod
     */
    private array $parametersGETMethod;

    /**
     * $_POST[]
     * @var array $parametersPOSTMethod
     */
    private array $parametersPOSTMethod;

    /**
     * @var array|false Parametros do header
     */
    private array|false $headers;

    /**
     * Construtor.
     * @param Router $router
     */
    public function __construct(Router $router) {
        $this->router               = $router;
        $this->httpMethod           = $_SERVER['REQUEST_METHOD'] ?? [];
        $this->parametersGETMethod  = $_GET ?? [];
        $this->parametersPOSTMethod = $_POST ?? [];
        $this->headers              = getallheaders();
        $this->uri                  = self::removeUriParams($_SERVER['REQUEST_URI'] ?? []);
    }

    /**
     * Seta a URI sem os parametros GET. Apenas o caminho.
     * @param string $uri para ser "exploded".
     * @return string nova uri sem os parametros
     */
    private function removeUriParams(string $uri): string {
        $uriSplit  = explode('?', $uri);
        return $uriSplit[0];
    }

    /**
     * Getter.
     * @return Router variavel de instancia $router
     */
    public function getRouter(): Router {
        return $this->router;
    }

    /**
     * Getter.
     * @return string variavel de instancia $httpMethod
     */
    public function getHttpMethod(): string {
        return $this->httpMethod;
    }

    /**
     * Getter.
     * @return string variavel de instancia $uri
     */
    public function getUri(): string {
        return $this->uri;
    }

    /**
     * Getter.
     * @return string variavel de instancia $headers
     */
    public function getHeaders(): string {
        return $this->headers;
    }

    /**
     * Getter.
     * @return array variavel de instancia $getMethodParams
     */
    public function getParametersGETMethod(): array {
        return $this->parametersGETMethod;
    }

    /**
     * Getter.
     * @return array variavel de instancia $postVars
     */
    public function getParametersPOSTMethod(): array {
        return $this->parametersPOSTMethod;
    }
}