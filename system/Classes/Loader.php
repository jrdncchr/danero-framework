<?php

/* Class used in controllers to use methods that load view, model and others.
 */
class Loader {

    private $caller = null;

    /* The caller is passed in the constructor because we need to add a property to the caller class.
    /* The VIEWS_PATH & MODELS_PATH is based in the config file. This is the path we used to look for the files.
     */
    function __construct($caller) {
        $this->caller = $caller;
    }

    /* Includes the view if exists.
     * @name - string, name of the php view.
     * @param - list of variables to be passed to that included php view.
     */
    public function view($name, $param = array(), $buffer = FALSE) {
        $view_path = VIEWS_PATH . $name . ".php";
        if(file_exists($view_path)) {

            /* If the view path exists, then we extract the param making all k->v a variable.
             * Those extract variables will be available to be used within the included php view.
             */
            extract($param, EXTR_OVERWRITE);

            /* If buffer is true, it will not print the included file, but buff and store it in a variable.
             * It will then return the variable.
             */
            if($buffer) {
                ob_start();
                include $view_path;
                $output = ob_get_contents();
                ob_end_clean();
                return $output;
            }
            include $view_path;
        } else {
            Error::display('VIEW_NOT_FOUND');
        }
        return false;
    }

    /* Includes the model if exist.
     * @model - string, name of the php model file.
     */
    public function model($model) {
        $model_path = MODELS_PATH . ucfirst($model) . ".php";
        if(file_exists($model_path)) {

            /* If the model exists, the model will be included and instantiated.
             * That instance is passed into a new property of a the caller class.
             * The property name will be the same as model name.
             */
            include $model_path;
            $this->caller->$model = new $model();
        } else {
            Error::display('MODEL_NOT_FOUND');
        }
    }

} 