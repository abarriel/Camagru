<?php
session_start();
function connect_db()
{
	$db = new PDO('mysql:host=localhost', 'root', 'root');
	$db->exec('CREATE DATABASE IF NOT EXISTS `CAMA_TEST` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;');
	$db_host = "localhost";
	$db_name = "CAMA_TEST";
	$db_user = "root";
	$db_pass = "root";
	try{
		$db_con = new PDO("mysql:host={$db_host};dbname={$db_name};charset=utf8",$db_user,$db_pass);
		$db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return($db_con);
	}
	catch(PDOException $e){
		{
			echo $e->getMessage();
			exit();
		}
	}
}
?>