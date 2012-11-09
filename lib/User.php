<?php
/**
* Stub class
*
*/
class User
{
    /**
    * @var mixed - DB object
    */
    private $db;

	/**
	* Constructor
	*
 	* @param $db mixed - DB object
 	* @param $auth mixed - Auth object
 	* @param $log mixed - Log object
	*/
    public function __construct(DB $db, Auth $auth, Log $log)
    {
        $this->db = $db;
        $this->auth = $auth;
        $log->track();
    }

	/**
	* Stub method to get user by id from database
	*
 	* @param $id int - user id
	*/
    public function get($id = 1) {
        return $this->db->query($id);
    }
}
?>