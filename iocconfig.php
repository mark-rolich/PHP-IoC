<?php
$iocconfig = array(
    'SuperUser' => 'User,Log',
    'User'      => array('DB,Auth,Log', array(1, 2, 3)),
    'Auth'      => array('Config,Log', array($config)),
    'DB'        => 'Config,Log',
    'Config'    => array('Log', array($config))
);
?>