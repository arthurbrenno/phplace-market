<?php

namespace Abwel\Phplace\Http;
use Closure;
use Exception;
use ReflectionFunction;

class Router {

    /**
     * @var string $url
     */
    private $url;

    /**
     * @var string $prefix
     */
    private $prefix;

    /**
     * @var array $routes
     */
    private $routes;

    /**
     * @var Request $request
     */
    private $request;

    public function __construct($url) {
        $this->request = new Request();
        $this->url     = $url;
        self::setPrefix($this->url);
    }

    public function get($route, $params = []) {
        self::addRoute('GET', $route, $params);
    }

    public function post($route, $params = []) {
        self::addRoute('POST', $route, $params);
    }

    public function run() {
        try {
            $route = self::getRoute();

            if (!isset($route['controller'])) {
                throw new Exception("URL could not be processed", 500);
            }

            $args = [];
            $reflection = new ReflectionFunction($route['controller']);

            foreach ($reflection->getParameters() as $parameter) {
                $name = $parameter->getName();
                $args[$name] = $route['variables'][$name] ?? '';
            }

            return call_user_func_array($route['controller'], $args);
        } catch (Exception $e) {
            return new Response($e->getCode(), $e->getMessage());
        }
    }

    private function getRoute() {
        $uri        = self::getUri();
        $httpMethod = $this->request->getHttpMethod();

        foreach ($this->routes as $patternRoute=>$methods) {
            if (preg_match($patternRoute, $uri, $matches)) {
                if (isset($methods[$httpMethod])) {
                    unset($matches[0]);

                    $keys = $methods[$httpMethod]['variables'];
                    $methods[$httpMethod]['variables'] = array_combine($keys, $matches);
                    $methods[$httpMethod]['variables']['request'] = $this->request;

                    return $methods[$httpMethod];
                }
                throw new Exception("This method is not allowed", 405);
            }
        }

        throw new Exception("URL not found", 404);
    }

    private function getUri() {
        $uri        = $this->request->getUri();
        $explodeUri = strlen($this->prefix) ? explode($this->prefix, $uri) : [$uri];
        return end($explodeUri);
    }

    private function addRoute($method, $route, $params = []) {
        foreach($params as $key=>$value) {
            if ($value instanceof Closure) {
                $params['controller'] = $value;
                unset($params[$key]);
            }
        }

        $params['variables'] = [];
        $patternVariable = '/{(.*?)}/';
        if (preg_match_all($patternVariable, $route, $matches)) {
            $route = preg_replace($patternVariable, '(.*?)', $route);
            $params['variables'] = $matches[1];
        }
        $desiredRoute = '/^' . str_replace('/', '\/', $route) . '$/';


        $this->routes[$desiredRoute][$method] = $params;

    }

    private function setPrefix($url) {
        $parsedUrl = parse_url($url);
        $this->prefix = $parsedUrl['path'] ?: '';
    }

}