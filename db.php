<?php
	$connection = new mysqli('localhost', 'root', '', 'payroll');

	if (!$connection)
	{
		die("Database Connection Failed" . mysql_error());
	}
?>