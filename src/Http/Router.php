<?php

namespace Abwel\Phplace\Http;
use       Closure;
use       Exception;
use       ReflectionFunction;

/**
 * Representa um roteador de URL.
 */
class Router {

    /**
     * @var string $url
     */
    private string $url;

    /**
     * @var string $prefix
     */
    private string $prefix;

    /**
     * @var array $routes
     */
    private array $routes;

    /**
     * @var Request $request
     */
    private Request $request;

    /**
     * Construtor.
     * @param string $url url para ser roteada
     */
    public function __construct(string $url) {
        $this->request = new Request($this);
        $this->url     = $url;
        $this->prefix  = self::getUrlPath($this->url);
    }

    /**
     * Adiciona uma rota por GET.
     * @param string $route endereco da rota.
     * @param array $params parametros da rota.
     * @return void
     */
    public function addGetRoute(string $route, array $params): void {
        self::addRoute('GET', $route, $params);
    }

    /**
     * Adiciona uma rota por POST.
     * @param string $route endereco da rota.
     * @param array $params parametros da rota.
     * @return void
     */
    public function addPostRoute(string $route, array $params = []): void {
        self::addRoute('POST', $route, $params);
    }

    /**
     * Tenta startar a rota.
     * @return mixed
     */
    public function run(): mixed {
        try {
            $route = self::getRoute();

            if (!isset($route['controller'])) {
                throw new Exception("URL could not be processed", 500);
            }

            $args       = [];
            $reflection = new ReflectionFunction($route['controller']);

            foreach ($reflection->getParameters() as $parameter) {
                $name        = $parameter->getName();
                $args[$name] = $route['variables'][$name] ?? '';
            }

            return call_user_func_array($route['controller'], $args);
        } catch (Exception $e) {
            return new Response($e->getCode(), $e->getMessage());
        }
    }

    /**
     * Pega a rota de uma URI.
     * @return mixed
     * @throws Exception
     */
    private function getRoute(): mixed {
        $uri        = self::getUriLastElement($this->request->getUri());
        $httpMethod = $this->request->getHttpMethod();

        foreach ($this->routes as $patternRoute=>$methods) {
            if (preg_match($patternRoute, $uri, $matches)) {
                if (isset($methods[$httpMethod])) {
                    unset($matches[0]);

                    $keys                                         = $methods[$httpMethod]['variables'];
                    $methods[$httpMethod]['variables']            = array_combine($keys, $matches);
                    $methods[$httpMethod]['variables']['request'] = $this->request;

                    return $methods[$httpMethod];
                }
                throw new Exception("This method is not allowed", 405);
            }
        }

        throw new Exception("URL not found", 404);
    }

    /**
     * Pega o ultimo elemento da URI.
     * @param string $uri
     * @return string|false
     */
    private function getUriLastElement(string $uri): string|false {
        $explodeUri = strlen($this->prefix) ? explode($this->prefix, $uri) : [$uri];
        return end($explodeUri);
    }

    /**
     * Adiciona uma nova rota
     * @param string $method GET|POST
     * @param string $route caminho da rota
     * @param array $params
     * @return void
     */
    private function addRoute(string $method, string $route, array $params = []): void {
        foreach($params as $key=>$value) {
            if ($value instanceof Closure) {
                $params['controller'] = $value;
                unset($params[$key]);
            }
        }

        $params['variables'] = [];
        $patternVariable     = '/{(.*?)}/';

        if (preg_match_all($patternVariable, $route, $matches)) {
            $route               = preg_replace($patternVariable, '(.*?)', $route);
            $params['variables'] = $matches[1];
        }

        $desiredRoute                         = '/^' . str_replace('/', '\/', $route) . '$/';
        $this->routes[$desiredRoute][$method] = $params;
    }

    /**
     * Obtem o caminho da URL.
     * @param string $url para ser obtida.
     * @return string caminho da URL.
     */
    private function getUrlPath(string $url): string {
        $parsedUrl    = parse_url($url);
        return $parsedUrl['path'] ?: '';
    }

}