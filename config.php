<?php

# production database server information
define (PRODUCTION_SERVER, "pwop-mys000.dc1.beachbody.com");
define (PRODUCTION_USER, "wpuser");
define (PRODUCTION_PASSWORD, "b3achb0dy!");
define (PRODUCTION_DB, "wordpressunified");
define (PRODUCTION_DB_DUMP_FILE, "wordpressunified-2014-03-31-17-14-09.sql");

# local database environment information
define (LOCAL_SERVER, "localhost");
define (LOCAL_USER, "root");
define (LOCAL_PASSWORD, "un1c0rn23");
define (LOCAL_PRODUCTION_COPY_DB, "WPU-LOCAL"); //name of database of local copy of production database
define (LOCAL_WORDPRESS_DB, "wordpressunified"); //name of local database used for wordpress


define (UPDATE_LOCAL_SITES, "update-to-local.sql"); // sql file to modify production site urls to local urls

define (LOCAL_PREFIX, "/Users/jpresley/Sites/wordpressunified/sql/");
define (IMPORT_FILES, "import-files.txt");
