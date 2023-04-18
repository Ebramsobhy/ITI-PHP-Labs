<?php
echo '
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>';

require_once('db_connection.php');

$db = new db(); // create a new instance of the db class

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $cols = "name, email, password";
    $values = "?, ?, ?";
    $dataArray = array($name, $email, $password);

    $db->addData("students", $cols, $values, $dataArray); 

	header("Location: students_table.php");

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Insert Data</title>
	<link rel="stylesheet" href="insert.css">
</head>
<body>
	<h1>Insert Data</h1>
	<form action="insert.php" method="post">
		<label for="name">Name:</label>
		<input type="text" id="name" name="name"><br>

		<label for="email">Email:</label>
		<input type="email" id="email" name="email"><br>

		<label for="password">Password:</label>
		<input type="password" id="password" name="password"><br>

		<input type="submit" value="Submit">
	</form>
</body>
</html>