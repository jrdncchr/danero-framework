<?php

/* The king class parse the uri into model, view & controller.
 * Gets the default controller from the config, if the controller is not set.
 */
class King {

    protected $controller;
    protected $method;
    protected $parameters = array();

    public function init() {
        $uri = explode("/", $_SERVER['QUERY_STRING']);

        /* If the controller is not set, then we get the default controller to use from the config.
         */
        if(isset($uri[1])) {
            $this->controller = strtolower($uri[1]);
        } else {
            global $config;
            $this->controller = $config['route']['default_controller'];
        }

        /* If the method is not set, we use the default 'index' method if set.
         */
        $this->method = isset($uri[2]) ? strtolower($uri[2]) : "index";

        /* Get the parameters.
         */
        if(sizeof($uri) >= 3) {
            for($i = 3; $i < sizeof($uri); $i++) {
                if($uri[$i] != "") {
                    $this->parameters[] = $uri[$i];
                }
            }
        }
    }

    /* Methods used for getting the properties of this class.
     */

    public function getController() {
        return $this->controller;
    }

    public function getMethod() {
        return $this->method;
    }

    public function getParameters() {
        return $this->parameters;
    }

} 