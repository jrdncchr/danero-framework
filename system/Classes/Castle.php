<?php
/**
 * The castle class is where every class is called and is being used.
 */

class Castle {

    private static $king = null;

    /* Return the instance of the king class.
     * If the king is not yet initialize, then it will initialize it first before returning.
     */
    private static function getInstance() {
        if(!self::$king) {
            self::init();
        }
        return self::$king;
    }

    /* Initialize the King.
     */
    private static function init() {
        $king = new King();
        $king->init();
        self::$king = $king;
    }

    /* Called in the index.php, initializes and validates all controller and method w/c parsed
     * by the King class based in the url.
     */
    public static function initialize() {
        $valid = false;

        /* Get the king instance to parse the url to controller, method and parameters.
         */
        $king = self::getInstance();


        /* Validate the if the controller class based in the url exists.
         * If exists, then we include that controller class.
         */
        $controller_class = ucfirst($king->getController()) . "Controller";
        $controller_path = CONTROLLERS_PATH . $controller_class . ".php";

        if(file_exists($controller_path)) {

            include_once $controller_path;

            /* Initialise the controller class.
             */
            $class = new $controller_class();

            /* Check if the method exist in the controller class and has the required parameters.
             * If it exists, then we call that method and pass the parameters.
             */
            $method = $king->getMethod() ? $king->getMethod() : "index";
            if(method_exists($class, $method)) {
                $classMethod = new ReflectionMethod($class, $method);
                if(sizeof($king->getParameters()) >= $classMethod->getNumberOfRequiredParameters()) {

                    /* Call the Shield class and then checks if the request is secure.
                     */
                    if(Shield::protect()) {
                        $valid = true;
                        call_user_func_array(array($class, $method), $king->getParameters());
                    } else {
                        Error::display('UNDER_ATTACK');
                    }
                }
            }

        }

        /* Return an error if its an invalid path.
         */
        if(!$valid) {
            Error::display('NOT_FOUND', "Something is WRONG in the Castle class, the path or controller was not found.");
        }
    }


} 