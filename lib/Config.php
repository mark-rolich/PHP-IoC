<?php
/**
* Stub configuration class
*
*/
class Config
{
    /**
    * @var string - database hostname
    */
    private $dbhost = 'localhost';

    /**
    * @var string - database user
    */
    private $dbuser = 'root';

    /**
    * @var string - database password
    */
    private $dbpwd = 'pwd';

    /**
    * @var string - database name
    */
    private $dbname = 'test';

	/**
	* Constructor
	*
 	* @param $log mixed - Log object
 	* @param $config mixed - configuration options array
	*/
    public function __construct(Log $log, $config)
    {
        $log->track();
    }

	/**
	* Getter
	*
 	* @param $name string - property name
 	* @return string - property value
	*/
    public function __get($name)
    {
        return $this->$name;
    }
}
?>