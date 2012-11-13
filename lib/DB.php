<?php
/**
* Stub database class
*
*/
class DB
{
    /**
    * Constructor
    *
    * @param $config mixed - Config object
    * @param $log mixed - Log object
    */
    public function __construct(Config $config, Log $log)
    {
        $host   = $config->dbname;
        $user   = $config->dbuser;
        $pwd    = $config->dbpwd;
        $name   = $config->dbname;

        $log->track();
    }

    /**
    * Stub DB query method
    *
    * @param $id int - record id
    */
    public function query($id)
    {
        return 'Loaded user with id: ' . $id . '<br>';
    }
}
?>