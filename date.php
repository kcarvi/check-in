<?php
require_once('db.php');

$dateFrom = strip_tags(trim($_POST['dateFrom']));
$dateTo = strip_tags(trim($_POST['dateTo']));
$dateFrom = $dateFrom.' 00:00:00';
$dateTo = $dateTo.' 23:59:59';

$result = $mysqli->query("SELECT * FROM `users` WHERE (FROM_UNIXTIME(`time`) >= '$dateFrom' && FROM_UNIXTIME(`time`) <= '$dateTo') ORDER BY time DESC");

$num_rows = mysqli_num_rows($result);

if ($num_rows > 0) {
	while($row = $result->fetch_assoc()){
		$users['surname'][] = $row['surname'];
		$users['name'][] = $row['name'];
		$users['number'][] = $row['number'];
		$users['time'][] = date('d.m.Y H:i:s', $row['time']);
	}
	echo json_encode($users);
} else {
	$array = array("surname" => "", "name" => "", "number" => "", "time" => "");
	echo json_encode($array);
}

?>





