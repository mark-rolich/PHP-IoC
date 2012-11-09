<?php
/**
* Stub authentication class
*
*/
class Auth
{
	/**
	* Constructor
	*
 	* @param $config mixed - Config object
 	* @param $log mixed - Log object
 	* @param $test mixed - some additional argument to inject
	*/
    public function __construct(Config $config, Log $log, $test)
    {
        $log->track();
    }
}
?>