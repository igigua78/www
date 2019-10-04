<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_igi = "localhost";
$database_igi = "servi295_andrea";
$username_igi = "servi295_ignacio";
$password_igi = "#antares291078igi";
$igi = mysql_pconnect($hostname_igi, $username_igi, $password_igi) or trigger_error(mysql_error(),E_USER_ERROR); 
?>