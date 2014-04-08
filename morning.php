<?php

include_once('functions.php');
include_once('config.php');

# make local copy of production database
$production_db_dump_file="wordpressunified-" . date("Y-m-d-H-i-s") . ".sql";
dump_db(PRODUCTION_SERVER, PRODUCTION_USER, PRODUCTION_PASSWORD, PRODUCTION_DB, $production_db_dump_file);

# refresh local copy of production db
refresh_db(LOCAL_SERVER, LOCAL_USER, LOCAL_PASSWORD, LOCAL_PRODUCTION_COPY_DB, $production_db_dump_file);

# refresh local copy of wordpressunified db
refresh_db(LOCAL_SERVER, LOCAL_USER, LOCAL_PASSWORD, LOCAL_WORDPRESS_DB, $production_db_dump_file);

# import update local sites sql file
import_sql(LOCAL_SERVER, LOCAL_USER, LOCAL_PASSWORD, LOCAL_WORDPRESS_DB, UPDATE_LOCAL_SITES);

?>
