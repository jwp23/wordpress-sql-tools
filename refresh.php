<?php
include_once('functions.php');
include_once('config.php');

define (PRODUCTION_DB_DUMP_FILE, "wordpressunified-2014-03-31-17-14-09.sql");

# refresh local copy of wordpressunified db
refresh_db(LOCAL_SERVER, LOCAL_USER, LOCAL_PASSWORD, LOCAL_WORDPRESS_DB, PRODUCTION_DB_DUMP_FILE);

# import update local sites sql file
import_sql(LOCAL_SERVER, LOCAL_USER, LOCAL_PASSWORD, LOCAL_WORDPRESS_DB, UPDATE_LOCAL_SITES);

?>
