<?php
define('DS', DIRECTORY_SEPARATOR);
define('BASEDIR', __DIR__ . DS);
define('LIBDIR', BASEDIR . DS . 'lib' . DS);

$config = array(
    'test' => 1
);

include BASEDIR . 'iocconfig.php';
include LIBDIR . 'Autoloader.php';

Autoloader::register();

$ioc = new IOC($iocconfig);

$superUser      = $ioc->resolve('SuperUser');
$newSuperUser   = $ioc->resolve('SuperUser');
$user           = $ioc->resolve('User');

echo $user->get(1);
?>