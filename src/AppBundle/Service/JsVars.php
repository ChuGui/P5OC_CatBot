<?php

namespace AppBundle\Service;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class JsVars
{
    // [...]

    /**
     * @var UrlGeneratorInterface
     */
    private $router;

    /**
     * @var array
     */
    private $routes;

    /**
     * Dépendance optionnelle vers un UrlGeneratorInterface.
     * Injectez le service router ici.
     *
     * @param UrlGeneratorInterface $router
     *
     * @return JsVars
     */
    public function enableRouter(UrlGeneratorInterface $router)
    {
        $this->router = $router;
        $this->routes = array();

        return $this;
    }

    /**
     * Ajoute une url de route à partir de son nom.
     * Le service la stockera sous le format:
     *      'route.name' => '/route/path'
     *
     * @param string $name nom de la route
     * @param array $parameters paramètre de la route
     *
     * @return JsVars
     *
     * @throws \Exception si le routeur n'a pas été injecté
     */
    public function addRoute($name, array $parameters = array())
    {
        if (null === $this->router) {
            throw new \Exception('Router must be enabled to use addRoute()');
        }

        $this->routes[$name] = $this->router->generate($name, $parameters);

        return $this;
    }

    /**
     * @return array
     */
    public function getRoutes()
    {
        return $this->routes;
    }
}