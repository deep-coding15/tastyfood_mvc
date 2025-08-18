<?php

$DB_SERVER = getenv("MVC_SERVER") ?: "localhost"; /* 127.0.0.1 */
$DB_DATABASE = getenv("MVC_DB") ?: "restaurant_tasty_food";
$DB_USER = getenv("MVC_USER") ?: "root";
$DB_PASSWORD = getenv("MVC_TOKEN") ?: "";
$DEBUG = getenv("MVC_DEBUG") ?: true;
$DB_PORT = getenv("MVC_PORT") ?: 3306; // Default MySQL port

return array(
    "DB_USER" => $DB_USER,
    "DB_PASSWORD" => $DB_PASSWORD,
    "DB_DSN" => "mysql:host=$DB_SERVER;dbname=$DB_DATABASE;charset=utf8",
    "DEBUG" => $DEBUG,
    "DB_SERVER" => $DB_SERVER,
    "DB_DATABASE" => $DB_DATABASE,
    "DB_PORT" => $DB_PORT, // Default MySQL port
);

