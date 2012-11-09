<?php
/**
* Stub logging class
*
*/
class Log
{
    /**
    * Displays information about loaded
    * classes and injected arguments
    */
    public function track()
    {
        $trace = debug_backtrace();
        $trace = $trace[1];
        extract($trace);

        $result = 'Called <b>' . $class . ':' . $function . '</b> with arguments:';
        $result .= '<pre>' . print_r($args, true) . '</pre><br>';

        echo $result;
    }
}
?>