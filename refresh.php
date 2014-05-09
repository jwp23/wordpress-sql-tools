<?php
require_once('functions.php');
require_once('config.php');

# refresh local copy of wordpressunified db
$refresh_db_dump_file = PRODUCTION_DB_DUMP;
$sql_path = SQL_FILES_PATH;

if (!empty($refresh_db_dump_file) && !file_exists($refresh_db_dump_file)) {
	exit ("PRODUCTION_DB_DUMP set in config.php does not exist");
}
if (empty($refresh_db_dump_file) && empty($sql_path)) {
	exit('SQL_FILES_PATH is not set. Set value in config.php file');
} else {
	$sql_files = scandir($sql_path);
	echo "<pre>"; print_r($sql_files); echo "</pre>";
	if (empty($sql_files)) {
		exit("No sql files available. Run morning.php or provide sql script");
	} else {
		$refresh_db_dump_file = $sql_path . end($sql_files);
	}
}

if (empty($refresh_db_dump_file)) {
	exit('Cannot calculate which sql dump file to use. $refresh_db_dump_file: ' . $refresh_db_dump_file);
}

refresh_db(LOCAL_SERVER, LOCAL_USER, LOCAL_PASSWORD, LOCAL_WORDPRESS_DB, $refresh_db_dump_file);

# import update local sites sql file
import_sql(LOCAL_SERVER, LOCAL_USER, LOCAL_PASSWORD, LOCAL_WORDPRESS_DB, UPDATE_LOCAL_SITES);

?>
