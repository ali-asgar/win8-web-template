<?php
	$connection_string = "dbname=de6tvs4ke4h1nt host=ec2-54-243-235-100.compute-1.amazonaws.com port=5432 user=uvscftzkhczzoz password=qbMzLTEWpn-aU8kCFGh2UDSrdQ sslmode=require";
	$db = pg_connect($connection_string);
	if(!$db) {
		echo "Database Connection Error";
		exit;
	}
?>