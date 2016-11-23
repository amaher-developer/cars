<?php
/**
 * @author maher
 * @copyright 2012
 */

session_start();
session_destroy();
setcookie('user','0', (time()+0));

header('Location: http://www.athantweets.com');

?>