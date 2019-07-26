<?php 

try 
{		
	$pdo = new PDO('mysql:host=localhost', 'root', '');
	$result = $pdo->query("CREATE DATABASE IF NOT EXISTS `phalcon_db`;");

	$pdo = new PDO('mysql:host=localhost;dbname=phalcon_db', 'root', '');
	$result = $pdo->query("
		CREATE TABLE `users` (
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `name` varchar(100) DEFAULT NULL,
			  `username` varchar(100) DEFAULT NULL,
			  `password` varchar(60) DEFAULT NULL,
			  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
			  PRIMARY KEY (`id`)
			) ENGINE=MyISAM DEFAULT CHARSET=latin1;

			CREATE TABLE `question_group` (
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `name` varchar(4000) DEFAULT NULL,
			  `user_id` int(11) DEFAULT NULL,
			  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
			  PRIMARY KEY (`id`)
			) ENGINE=MyISAM DEFAULT CHARSET=latin1;

			CREATE TABLE `questions` (
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `name` varchar(4000) DEFAULT NULL,
			  `question_group_id` int(11) DEFAULT NULL,
			  `created_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
			  PRIMARY KEY (`id`)
			) ENGINE=MyISAM DEFAULT CHARSET=latin1;

			CREATE TABLE `answers` (
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `name` varchar(4000) DEFAULT NULL,
			  `question_id` int(11) DEFAULT NULL,
			  `is_answer` bit(1) DEFAULT b'0',
			  PRIMARY KEY (`id`)
			) ENGINE=MyISAM DEFAULT CHARSET=latin1;");
	if($result) print "OK";
	else print "ERROR";
} 
catch (Exception $e) 
{
	print $e->getMessage();
}