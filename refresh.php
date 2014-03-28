<?php
require 'functions.php';
require 'config.php';

define (PRODUCTION_DB_DUMP_FILE, "wordpressunified-2014-03-27-15-29-59.sql");

# refresh local copy of wordpressunified db
refresh_db(LOCAL_SERVER, LOCAL_USER, LOCAL_PASSWORD, LOCAL_WORDPRESS_DB, PRODUCTION_DB_DUMP_FILE);

# import update local sites sql file
import_sql(LOCAL_SERVER, LOCAL_USER, LOCAL_PASSWORD, LOCAL_WORDPRESS_DB, UPDATE_LOCAL_SITES);

?>
