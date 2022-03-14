<?php
ob_start();
//========================================

//sample-1 for PDO-MySql
function createDB(){
	$conn = new PDO("mysql:host=localhost;dbname=mcg_db", "root", "");	
	return $conn;	
}

//========================================

/* 
//sample-2 for PDO-PgSql
function createDB(){
	define("DEF_DATABASECONNECTION", 'pgsql');
	define("DEF_HOST", 'localhost');
	define("DEF_USER", 'postgres');
	define("DEF_PASSWORD", 'yourpassword');
	define("DEF_DATABASENAME", 'yourdatabase');	
	$conn = new PDO(DEF_DATABASECONNECTION . ":host=" . DEF_HOST . ";dbname=" . DEF_DATABASENAME, DEF_USER, DEF_PASSWORD); 
	return $conn;	
}
*/
//========================================


?>