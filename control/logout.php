<?php

/**
 * @author maher
 * @copyright 2012
 */

include '../prepare.php';
$admin = $_SESSION['admin'];

$message = $admin['name'].' logout at '.Date::timestampToSecMinHourDayMonthYear(time());
AdminLog::insert($admin['id'], $message, '2');

unset($_COOKIE['user_id']);
setcookie("user_id", "", time()-3600);
session_start();
session_destroy();

        ?>
 <html dir="rtl">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"; encoding="utf-8">
  <title><?php echo $title?></title>
  <script type="text/javascript">
	      parent.location.href="index.php";
	   </script>
        
  </body>
  </html>
