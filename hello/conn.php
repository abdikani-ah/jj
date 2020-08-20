<?php
	$conn = new PDO('sqlite:db_member.sqlite3');
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$query = "CREATE TABLE IF NOT EXISTS member(id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, username TEXT, password TEXT)";
	$files = "CREATE TABLE IF NOT EXISTS files(id integer primary key, userid int, file text, size int, timee int, original text, deleted int)";
	
	$conn->exec($query);
	$conn->exec($files);
?>
