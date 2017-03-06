<?php 
interface FrontControllerInterface
{
    public function setController($controller);
    public function setAction($action);
    public function setParams(array $params);
    public function run();
}
class FrontController implements FrontControllerInterface
{
    const DEFAULT_CONTROLLER = "IndexController";
    const DEFAULT_ACTION     = "index";
    
    protected $controller    = self::DEFAULT_CONTROLLER;
    protected $action        = self::DEFAULT_ACTION;
    protected $params        = array();
    protected $basePath      = "home/";
    
    public function __construct(array $options = array()) {
        if (empty($options)) {
           $this->parseUri();
        }
        else {
            if (isset($options["controller"])) {
                $this->setController($options["controller"]);
            }
            if (isset($options["action"])) {
                $this->setAction($options["action"]);     
            }
            if (isset($options["params"])) {
                $this->setParams($options["params"]);
            }
        }
        return $this;
    }
    
    protected function parseUri() {
        $path = trim(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), "/");
        $path = preg_replace('~/[^a-zA-Z0-9]//~', "", $path);
        $home = trim($this->basePath,"/");
        if (strpos($path, $home) === 0) {
            $path = substr($path, strlen($this->basePath));
        }
        
        @list($controller, $action, $params) = explode("/", $path, 3);

        if (!empty($controller)) {
            $this->setController($controller);
        }
        if (is_numeric($action)){
            $this->setParams([$action]);
            $action = "";
        }
        if (!empty($action)) {
            $this->setAction($action);
        }
        if (!empty($params)) {
            $this->setParams(explode("/", $params));
        }

    }
    
    public function setController($controller) {
        $controller = ucfirst(strtolower($controller)) . "Controller";
        if (!class_exists($controller)) {
            throw new InvalidArgumentException(
                "The action controller '$controller' has not been defined.");
        }
        $this->controller = $controller;
        return $this;
    }
    
    public function setAction($action) {
        $reflector = new ReflectionClass($this->controller);
        if (!$reflector->hasMethod($action)) {
            throw new InvalidArgumentException(
                "The controller action '$action' has been not defined.");
        }

        $this->action = $action;
        return $this;
    }
    
    public function setParams(array $params) {
        $this->params = $params;
        return $this;
    }
    
    public function run() {
        //create ref controller instance
        $ref = new ReflectionClass($this->controller);
        //we will pass these options to constructor for future use
        $options = array($this->controller,$this->action,$this->params);
        //create the actual instance here with constructor args
        $controllerInstance = $ref->newInstanceArgs($options);
        //call the action 
        call_user_func_array(array($controllerInstance, $this->action), $this->params);
    }
}