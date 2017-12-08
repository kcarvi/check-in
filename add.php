<?php

require_once('db.php');

$surname = strip_tags(trim($_POST['surname']));
$name = strip_tags(trim($_POST['name']));
$number = strip_tags(trim($_POST['number']));
$time = time();

if($name && $surname){

	$mysqli->query("INSERT INTO `users` VALUES(NULL, '$surname', '$name', '$number', '$time')");

	$result = $mysqli->query("SELECT * FROM `users` ORDER BY time DESC LIMIT 1");

	while($row = $result->fetch_assoc()){
		$users['surname'][] = $row['surname'];
		$users['name'][] = $row['name'];
		$users['number'][] = $row['number'];
		$users['time'][] = date('d.m.Y H:i:s', $row['time']);
	}

}

echo json_encode($users);

?>