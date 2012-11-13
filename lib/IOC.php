<?php
/**
* PHP IoC (Inversion of Control) container
*
* Implements IoC principle
* to resolve dependencies between classes and acheive loose coupling.
* IoC is implemented using dependency constructor injection.
* Dependencies should be defined in configuration file
*/
class IOC
{
    /**
    * @var mixed - dependencies configuration array
    */
    private $config;

    /**
    * @var mixed - objects storage array
    * (keys are class names, values are class instances)
    */
    private $data;

    /**
    * Constructor
    *
    * @param $config mixed - IOC configuration (array)
    */
    public function __construct($config)
    {
        $this->config = $config;
    }

    /**
    * Getter
    * Picks up object with provided class name
    * from objects storage
    *
    * @param $name string - class name
    * @return mixed - object picked up from objects storage
    */
    public function __get($name)
    {
        return $this->data[$name];
    }

    /**
    * Setter
    * Places object with provided class name
    * in objects storage
    *
    * @param $name string - class name
    * @param $value mixed - class instance to add to objects storage
    */
    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    /**
    * Check if object with provided class name
    * exists in objects storage
    *
    * @param $name string - class name
    * @return bool
    */
    public function __isset($name)
    {
        return isset($this->data[$name]);
    }

    /**
    * Recursively traverses configuration array,
    * instantiates classes with provided dependencies
    * or picks up already instantiated classes from objects storage,
    * injecting additional arguments to classes constructors if provided
    *
    * @param $className string - class name
    * @return mixed - class instance (initialized or picked up from objects storage)
    */
    public function resolve($className)
    {
        $instance = null;

        if (isset($this->$className)) {
            $instance = $this->$className;
        } else {
            if (isset($this->config[$className])) {
                $dependency = array();
                $params = array();
                $use = $this->config[$className];

                if (is_array($this->config[$className])) {
                    $use = $this->config[$className][0];
                    $params = $this->config[$className][1];
                }

                if (strpos($use, ',') !== false) {
                    $useList = explode(',', $use);

                    foreach ($useList as $dClassName) {
                        $dependency[] = call_user_func_array(
                            array($this, __FUNCTION__),
                            array($dClassName)
                        );
                    }
                } else {
                    $dependency[] = call_user_func_array(
                        array($this, __FUNCTION__),
                        array($use)
                    );
                }

                if ($use !== null) {
                    $args = array_merge($dependency, $params);
                } else {
                    $args = $params;
                }

                $reflect  = new ReflectionClass($className);
                $instance = $reflect->newInstanceArgs($args);
            } elseif ($className !== null) {
                $instance = new $className();
            }

            $this->$className = $instance;
        }

        return $instance;
    }
}
?>