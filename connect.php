<?php
$connect_error = 'Sorry, we\'re experiencing connection issues.';
mysql_connect('localhost', 'root', '') or die($connect_error);
mysql_select_db('users') or die ($connect_error);

?>