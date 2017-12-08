<html>
	<head>
		<meta charset="utf-8">
		<title>Title</title>
		<link rel="stylesheet" href="css/style.css">
		<script src="js/script.js"></script>
	</head>
	<body>
		<div class="container">
			<form method="post" action="#">
				<fieldset>
					<legend>Add user data</legend>
					<input type="text" name="surname" class="surnameField" placeholder="Surname" autofocus>
					<input type="text" name="name" class="nameField" placeholder="Name">
					<input type="text" name="number" class="numberField" placeholder="Serial number">
					<input class="btn-add" type="submit" value="Add">
				</fieldset>
			</form>
			<form method="post" name="date" action="#">
				<fieldset>
					<legend>Select date</legend>
					<label for="dateFrom">from: </label><input type="date" name="dateFrom" class="dateFrom">
					<label for="dateTo">to: </label><input type="date" name="dateTo" class="dateTo">
					<input class="btn-date" type="submit" value="Load">
				</fieldset>
			</form>
			<table class="output">
				<thead>
					<tr><th>Surname</th><th>Name</th><th>Serial number</th><th>Date</th></tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
	</body>
</html>