<?php
include_once('functions.php');
include_once('config.php');

# import list of files
$file_contents_raw=file(IMPORT_FILES);
$file_contents_neat=array();
$file_names_full=array();

# trim end of line character
foreach ($file_contents_raw as $key => $file_raw)
{
	$file_contents_neat[$key] = rtrim($file_raw);
}

# add path prefix to file names
foreach ($file_contents_neat as $key => $file_neat)
{
	$file_names_full[$key]=LOCAL_PREFIX . $file_neat;
}

# loop through and import sql files

foreach ($file_names_full as $sql)
{
	$return=import_sql(LOCAL_SERVER, LOCAL_USER, LOCAL_PASSWORD, LOCAL_WORDPRESS_DB, $sql);
	
	if ($return == 1) {
		exit ('Import file caused sql error. Exit script.');
	}
}
?>