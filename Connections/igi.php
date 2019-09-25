<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_igi = "10.10.1.3";
$database_igi = "andrea";
$username_igi = "ignacio";
$password_igi = "291078";
$igi = mysql_pconnect($hostname_igi, $username_igi, $password_igi) or trigger_error(mysql_error(),E_USER_ERROR); 
?>