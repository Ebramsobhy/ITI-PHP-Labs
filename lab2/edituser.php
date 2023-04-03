<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>';


$user_id = $_GET["id"];

$users = file('customer.txt');

foreach($users as $user){
  $user_data = explode(':', $user);
  if($user_data[0]==$user_id){
    $first_name = $user_data[0];
    $last_name = $user_data[1];
    $address = $user_data[2];
    $country = $user_data[3];
    $gender = $user_data[4];
    $skills = $user_data[5];
    $username = $user_data[6];
    $password = $user_data[7];
    $department = $user_data[8];
    break;
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>My Form</title>
</head>
<link rel="stylesheet" >
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style>
   
  form {
  display: flex;
  flex-direction: column;
  align-items: center;
  border: 1px solid black;
  padding: 20px;
  margin: 0 auto;
  max-width: 500px;
  background-color: beige;
}

.form-group {
  flex-direction: column;
  margin-bottom: 10px;
  width: 100%;
  max-width: 400px;
}

label {
  font-size: 16px;
  font-weight: bold;
  margin-bottom: 5px;
}

input[type="text"],
input[type="password"] {
  padding: 10px;
  border: 2px solid #ccc;
  border-radius: 4px;
  width: 100%;
}

input[type="radio"] {
  margin-right: 5px;
}

input[type="submit"] {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 16px;
  margin-top: 10px;
}

input[type="submit"]:hover {
  background-color: #3e8e41;
}

.form-group label {
  display: block;
  font-weight: bold;
  margin-bottom: 5px;
}

.form-group input[type="checkbox"] {
  margin-right: 5px;
}
label {
  display: inline-block;
  margin-bottom: 0.5rem;
  font-weight: bold;
}

select {
  display: block;
  width: 100%;
  padding: 0.375rem 0.75rem;
  font-size: 1rem;
  font-weight: 400;
  line-height: 1.5;
  color: #212529;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid #ced4da;
  border-radius: 0.25rem;
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

select:focus {
  outline: none;
  border-color: #80bdff;
  box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}

</style>
<body>
<form action="updateUser.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $user_id ?>">
    <div class="form-group">
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" id="first_name" value="<?php echo $first_name ?>"><br>
    </div>

    <div class="form-group">
        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" id="last_name" value="<?php echo $last_name ?>"><br>
    </div>

    <div class="form-group">
        <label for="address">Address:</label>
        <input type="text" name="address" id="address" value="<?php echo $address ?>"><br>
    </div>

    <div class="form-group">
    <label for="country">Country:</label>
    <select name="country" id="country">
        <option value="Egypt" <?php echo $country == 'Egypt' ? 'selected' : '' ?>>Egypt</option>
        <option value="Algeria" <?php echo $country == 'Algeria' ? 'selected' : '' ?>>Algeria</option>
        <option value="Libya" <?php echo $country == 'Libya' ? 'selected' : '' ?>>Libya</option>
    </select>
</div>

    <div class="form-group">
        <label for="gender">Gender:</label>
        <input type="radio" name="gender" value="male" <?php echo $gender == 'male' ? 'checked' : '' ?>> Male
        <input type="radio" name="gender" value="female" <?php echo $gender == 'female' ? 'checked' : '' ?>> Female<br>
    </div>

    <div class="form-group">
    <label>Skills:</label>
    <input type="checkbox" name="skills[]" value="PHP" <?PHP if($skills=='PHP') echo 'checked' ; ?> >PHP<br>
    <input type="checkbox" name="skills[]" value="MySQL" <?PHP if($skills=='MySQL') echo 'checked' ; ?>>MySQL<br>
    <input type="checkbox" name="skills[]" value="javascript" <?PHP if($skills=='javascript') echo 'checked' ; ?>>JavaScript<br>
    </div>

    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" value="<?php echo $username ?>"><br>
    </div>

    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" value="<?php echo $password ?>"><br>
    </div>

    <div class="form-group">
        <label for="department">Department:</label>
        <input type="text" name="department" id="department" value="<?php echo $department ?>"><br>
    </div>

    <input type="submit" name="submit" value="Update">
</form>
</body>
