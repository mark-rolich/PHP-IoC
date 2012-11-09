<?php
/**
* Stub class
*
*/
class SuperUser
{
	/**
	* Constructor
	*
 	* @param $user mixed - User object
 	* @param $log mixed - Log object
	*/
    public function __construct(User $user, Log $log)
    {
        $log->track();
    }
}
?>