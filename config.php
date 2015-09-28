<?php

# production database server information
define ("PRODUCTION_SERVER", "");
define ("PRODUCTION_USER", "");
define ("PRODUCTION_PASSWORD", "");
define ("PRODUCTION_DB", "");
define ("PRODUCTION_DB_DUMP_FILE", "");

# local database environment information
define ("LOCAL_SERVER", "");
define ("LOCAL_USER", "");
define ("LOCAL_PASSWORD", "");
define ("LOCAL_PRODUCTION_COPY_DB", ""); //name of database of local copy of production database
define ("LOCAL_WORDPRESS_DB", ""); //name of local database used for wordpress


define ("UPDATE_LOCAL_SITES", ""); // sql file to modify production site urls to local urls

define ("LOCAL_PREFIX", ""); // path prefix aka directory path for sql files to apply to database after UPDATE_LOCAL_SITES file is applied
define ("IMPORT_FILES", "import-files.txt");
define ("MYSQL_PATH", "/usr/local/mysql/bin/");
