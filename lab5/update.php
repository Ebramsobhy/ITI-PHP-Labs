<?php
require_once('db_connection.php');

$db = new db(); // create a new instance of the db class

// Get the user's existing data
$student_id = $_GET['id'];
$student_data = $db->getData('students', '*', "id = $student_id")->fetch(PDO::FETCH_ASSOC);

// Update the user's data if the form is submitted
if (isset($_POST['submit'])) {
    $new_name = $_POST['name'];
    $new_email = $_POST['email'];
    $new_password = $_POST['password'];
    $db->updateData('students', "name = '$new_name', email = '$new_email', password = '$new_password'", "id = $student_id");
    header("Location: students_table.php?id=$student_id");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update User Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Update User Data</h1>
        <form method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $student_data['name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $student_data['email']; ?>" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" value="<?php echo $student_data['password']; ?>" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
