<?php
# makes use of system() instead of mysqli. Need 2>&1 to output response to browser instead of Apache error log
function exec_command($command)
{
	echo "<code>shell$ " . $command . "</code>";
	echo "<pre>";
	system ($command, $return_value);
	echo "Return value:" . $return_value;
	echo "</pre>";
	echo "<br>\n";
	return $return_value;
}

function dump_db($dump_server, $dump_user, $dump_password, $dump_db, $dump_sql)
{
	$dump="mysqldump -h $dump_server -u $dump_user -p'$dump_password' $dump_db 2>&1 > $dump_sql";
	exec_command($dump);
}
function drop_db($drop_server, $drop_user, $drop_password, $drop_db)
{
	$drop="mysqladmin -h $drop_server -u $drop_user -p$drop_password -f drop $drop_db 2>&1";
	exec_command($drop);
}

function create_empty_db($create_server, $create_user, $create_password, $create_db)
{
	$create="mysqladmin -h $create_server -u $create_user -p$create_password create $create_db 2>&1";
	exec_command($create);
}

function import_sql($import_server, $import_user, $import_password, $import_db, $sql_file)
{
	$import="mysql -h $import_server -u $import_user -p$import_password $import_db < $sql_file 2>&1";
	$return_import=exec_command($import);
	return $return_import;
}

function refresh_db($refresh_server, $refresh_user, $refresh_password, $refresh_db, $refresh_original)
{
	#drop database
	drop_db($refresh_server, $refresh_user, $refresh_password, $refresh_db, $refresh_original);
	
	#create empty database
	create_empty_db($refresh_server, $refresh_user, $refresh_password, $refresh_db, $refresh_original);
	
	#import original sql file
	import_sql($refresh_server, $refresh_user, $refresh_password, $refresh_db, $refresh_original);
}


