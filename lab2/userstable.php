<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);

    echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>';
    
        echo "<div class='container  fs-4'>";
        echo "<h1>Display Users in a table</h1>";

// Display all records in a table
try{
    $users = file("customer.txt");
    echo "<table class='table'> <tr> <th>First Name</th> 
         <th>Last Name</th> <th>Address</th> <th>Country</th> 
         <th>Gender</th> <th>Skills</th> <th>Username</th> 
         <th>Password</th> <th>Department</th></tr>";

    foreach($users as $user){
        echo '<tr>';
        $users_data = explode(':', $user);
        foreach($users_data as $info){
            echo "<td>{$info}</td>";
        }
        echo "<td> <a class='btn btn-warning' href='editUser.php?id={$users_data[0]}'>Edit </a> </td> 
                       <td> <a class='btn btn-danger' href='deleteUser.php?id={$users_data[0]}'>Delete </a> </td>
                </tr>";
    }
    echo "</table>";

}catch (Exception $e){
    echo $e->getMessage();
}

?>

<a href="form.php" class="btn btn-primary">Add new user</a>