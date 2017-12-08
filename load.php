<?php

require_once('db.php');

$result = $mysqli->query("SELECT * FROM `users` WHERE (FROM_UNIXTIME(`time`) >= CURRENT_DATE()) ORDER BY time DESC");
while($row = $result->fetch_assoc()){
	$users['surname'][] = $row['surname'];
	$users['name'][] = $row['name'];
	$users['number'][] = $row['number'];
	$users['time'][] = date('d.m.Y H:i:s', $row['time']);
}

echo json_encode($users);

?>


