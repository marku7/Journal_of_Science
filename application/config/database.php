<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'default';
$query_builder = TRUE;

$db['default'] = array(
	'dsn'	=> '',
	'hostname' => 'localhost',
	'username' => 'root', // Replace 'your_mysql_username' with your actual MySQL username
	'password' => 'root', // Replace 'your_mysql_password' with your actual MySQL password
	'database' => 'reg', // Replace 'blogdb' with your actual database name
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8mb4', // Set character set to utf8mb4 to support emojis and special characters
	'dbcollat' => 'utf8mb4_general_ci', // Set collation to utf8mb4_general_ci
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
