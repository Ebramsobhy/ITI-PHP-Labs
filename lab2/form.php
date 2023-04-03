<?php
   
   if($_GET){
      // var_dump($_GET);
      $errors = json_decode($_GET["errors"], true);
      // var_dump($errors);
   }

   if(isset($_GET["old"])){
     $old_data = json_decode($_GET["old"], true);
   }
?>


<!DOCTYPE html>
<html>
<head>
  <title>My Form</title>
</head>
<link rel="stylesheet" href="./form.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<body>
    <div class="form-container">
  <form method="POST" action="saveuser.php">
    <label for="first-name">First Name:</label>
    <input type="text" name="first-name" id="first-name" value="<?php if(isset($old_data['first-name'])) echo $old_data['first-name']; ?>">
    <span class="text-danger"><?php if(isset($errors['first-name'])) echo $errors['first-name']; ?> </span><br>

    <label for="last-name">Last Name:</label>
    <input type="text" name="last-name" id="last-name" value="<?php if(isset($old_data['last-name'])) echo $old_data['last-name']; ?>"><br>
    <span class="text-danger"><?php if(isset($errors['last-name'])) echo $errors['last-name']; ?> </span><br>
    <label for="address">Address:</label>
    <textarea name="address" id="address" rows="5" cols="50"></textarea><br>    

    <label for="country">Country:</label>
    <select name="country" id="country">
      <option value="Egypt">Egypt</option>
      <option value="Algeria">Algeria</option>
      <option value="Libya">Libya</option>
    </select><br>

    <label for="gender">Gender:</label>
    <input type="radio" name="gender" id="gender-male" value="male" >
    <label for="gender-male">Male</label>
    
    <input type="radio" name="gender" id="gender-female" value="female" >
    <label for="gender-female">Female</label> <br> <br>
    <span class="text-danger"><?php if(isset($errors['gender'])) echo $errors['gender']; ?> </span><br>
    <label>Skills:</label>
    <input type="checkbox" name="skills[]" value="PHP">PHP<br>
    <input type="checkbox" name="skills[]" value="MySQL">MySQL<br>
    <input type="checkbox" name="skills[]" value="javascript">JavaScript<br>
     
    <br>

    <label for="username">Username:</label>
    <input type="text" name="username" id="username" ><br>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password" ><br>

    <label for="department">Department:</label>
    <input type="text" name="department" id="department" ><br>

    <input type="submit" value="Submit">
    <input type="reset" value="Reset">
  </form> 
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
