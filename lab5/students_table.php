<?php
echo '
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>';

require_once('db_connection.php');

$db = new db(); // create a new instance of the db class
$students = $db->getData('students')->fetchAll(PDO::FETCH_OBJ);

if (isset($_POST['delete'])) {
    $id = $_POST['delete'];
    $db->delete('students', "id = $id");
    header("Location: students_table.php");
    exit;
}
?>

<table class="table table-striped">
    <thead>
        <tr>
            <th>name</th>
            <th>email</th>
            <th>password</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($students as $student): ?>
        <tr>
            <td><?php echo $student->name; ?></td>
            <td><?php echo $student->email; ?></td>
            <td><?php echo $student->password; ?></td>
            <td>
                <form method="post" action="students_table.php">
                    <input type="hidden" name="delete" value="<?php echo $student->id; ?>">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
             <td>
                <a href="update.php?id=<?php echo $student->id; ?>" class="btn btn-primary">Update</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

    <div class="text-center">
         <a href="insert.php" class="btn btn-primary">Add new student</a>
    </div>
