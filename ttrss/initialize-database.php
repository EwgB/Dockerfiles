#!/usr/bin/php
<?php

define("TTRSS_ROOT_PATH", "/app");

set_include_path(TTRSS_ROOT_PATH ."/classes" . PATH_SEPARATOR . get_include_path());
set_include_path(TTRSS_ROOT_PATH ."/include" . PATH_SEPARATOR . get_include_path());

define('DISABLE_SESSIONS', true);

chdir(TTRSS_ROOT_PATH);

require_once "autoload.php";
require_once "functions.php";
require_once "rssutils.php";
require_once "config.php";
require_once "sanity_check.php";
require_once "db.php";
require_once "db-prefs.php";

$not_connected = true;
while ($not_connected) {
    $not_connected = false;

    echo "Attempt to connect to database...\n";

    try {
        $connection = pg_connect(sprintf("host=%s dbname=%s user=%s password=%s", DB_HOST, DB_NAME, DB_USER, DB_PASS));
    } catch (Exception $e) {
        echo "Cannot connect to MySQL: " . $e->getMessage() . "\n";
        $not_connected = true;
        sleep(2);
    }
}

echo "Connected to " . pg_host($connection) . "\n";


$is_ttrss_installed = db_query("SELECT schema_version FROM ttrss_version", false);

if (!$is_ttrss_installed) {
    echo "Initialize database...\n";

    $lines = explode(";", preg_replace("/[\r\n]/", "", file_get_contents("schema/ttrss_schema_".basename(DB_TYPE).".sql")));

    foreach ($lines as $line) {
        if (strpos($line, "--") !== 0 && $line) {
            db_query($line);
        }
    }

    echo "Database initialization completed.\n";
} else {
    echo "Database is already initialized.\n";
}

?>
