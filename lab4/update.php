<?php
echo '
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>';

require_once('connection/db_connection.php');

//for displaying errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

        // validate data
        $errors = [];
        $formvalues =[];

if(!empty($_POST["sub"])){
   
if($_POST["name"]){
    $name = $_POST["name"];
    }else{$errors["name"] = "Name is Required";}
    
    if($_POST["email"]){
    
    if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
    $email = $_POST["email"];
    }else{$errors["email"] = "Email is Invalid";}
    }else{$errors["email"] = "Email is Required";}
    
    if($_POST["password"]){
        //bonus
    $pattern ="/^[a-z_]{8,}$/i";
    if(preg_match($pattern,$_POST["password"])){
    $password = $_POST["password"];
    }else{$errors["password"] = "Invalid password, should be only 8 lowercase letters & only (_) allowed";}
    }else{$errors["password"] = "Password is Required";}
    
     if($_POST["confirm"]){
    $confirm_Pass = $_POST["confirm"];
    if($confirm_Pass != $password){$errors["confirm"] = "password isn't matched";}
    
    }else{$errors["confirm"] = "Confirm password is Required";}
    
    if($_POST["room"] != ""){
    $room = $_POST["room"];
    }else{$errors["room"] = "NO.ROOM is Required";}
    
    if($_POST["exit"]){
        $exit = $_POST["exit"];
        }else{$errors["exit"] = "NO.exit is Required";}
    
    $formerrors=json_encode($errors);

if($errors){
    $id = $_GET['id'];
    $redirect_url = "Location:edit.php?id={$id}&errors={$formerrors}";
    if ($formvalues){
      $oldvalues = json_encode($formvalues);
      $redirect_url .="&old={$oldvalues}" ;
    }

    header($redirect_url);
}

if(!$errors){
    
  var_dump($_REQUEST);
    $id = $_GET['id'];
    $username = $_POST['name'];
    $useremail = $_POST['email'];
    $userpassword = $_POST['password'];
    $userroom = $_POST['room'];
    $userexit = $_POST['exit'];
    
    try{
        
        if($db){
          $select_query = "UPDATE users SET `name` = :username, `email` = :useremail, `password` = :userpassword, `room` = :userroom, `exit` = :userexit WHERE id = :id";
          $stmt = $db->prepare($select_query);
          $stmt->bindParam('id', $id, PDO::PARAM_INT);
          $stmt->bindParam('username', $username, PDO::PARAM_STR);
          $stmt->bindParam('useremail', $useremail, PDO::PARAM_STR);
          $stmt->bindParam('userpassword', $userpassword, PDO::PARAM_STR);
          $stmt->bindParam('userroom', $userroom, PDO::PARAM_STR);
          $stmt->bindParam('userexit', $userexit, PDO::PARAM_STR);
         
    
          $res = $stmt->execute();
          if($stmt->rowCount()){
            echo "updated";
    
            header("location:display.php");
          }
    
          $row = $stmt->fetch(PDO::FETCH_ASSOC);
      
        }
  
        }catch(Exception $e){
         echo $e->getMessage();
        }

 }
}
    
      
  


