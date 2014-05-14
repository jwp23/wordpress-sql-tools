<?php
# makes use of system() instead of mysqli. Need 2>&1 to output response to browser instead of Apache error log
function display_command ($command, $output, $return_value)
{
	echo "<code>" . date("Y-m-d-H:i:s") . "shell$ " . $command . "</code><br />";
	
	foreach ($output as $value) {
		echo "<code>" . $value . "</code><br />";
	}
	echo "<code>Return value: " . $return_value . "</code><br />";
}
function exec_command($command)
{
	$output = array();
	$results = exec ($command, $output, $return_value);
	display_command($command, $output, $return_value);
	return $return_value;
}

function dump_db($dump_server, $dump_user, $dump_password, $dump_db, $dump_sql)
{
	$dump= MYSQL_PATH . "mysqldump -h $dump_server -u $dump_user -p'$dump_password' $dump_db 2>&1 > $dump_sql";
	exec_command($dump);
}
function drop_db($drop_server, $drop_user, $drop_password, $drop_db)
{
	$drop= MYSQL_PATH . "mysqladmin -h $drop_server -u $drop_user -p$drop_password -f drop $drop_db 2>&1";
	$return_drop = exec_command($drop);
	return $return_drop;
}

function create_empty_db($create_server, $create_user, $create_password, $create_db)
{
	$create= MYSQL_PATH . "mysqladmin -h $create_server -u $create_user -p$create_password create $create_db 2>&1";
	$return_create = exec_command($create);
	return $return_create;
}

function import_sql($import_server, $import_user, $import_password, $import_db, $sql_file)
{
	
	$import= MYSQL_PATH . "mysql -h $import_server -u $import_user -p$import_password $import_db < $sql_file 2>&1";
	$return_import=exec_command($import);
	return $return_import;
}

function refresh_db($refresh_server, $refresh_user, $refresh_password, $refresh_db, $refresh_original)
{
	#drop database
	$return_drop = drop_db($refresh_server, $refresh_user, $refresh_password, $refresh_db, $refresh_original);
	
	#create empty database
	$return_create = create_empty_db($refresh_server, $refresh_user, $refresh_password, $refresh_db, $refresh_original);
	if ($return_create == 1) {
		exit ('Create database ' . $refresh_db . ' failed. Exit script.');
	}
	
	#import original sql file
	$return_import = import_sql($refresh_server, $refresh_user, $refresh_password, $refresh_db, $refresh_original);
	if ($return_import == 1) {
		exit ('Import ' . $refresh_original . ' failed. Exit script.');
	}
}


