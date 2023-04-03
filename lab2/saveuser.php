<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);

        echo "<div class='container  fs-4'>";
        echo "<h1>Save user</h1>";

        // Get the form data
        $firstName = isset($_POST['first-name']) ? $_POST['first-name'] : '';
        $lastName = isset($_POST['last-name']) ? $_POST['last-name'] : '';
        $address = isset($_POST['address']) ? $_POST['address'] : '';
        $country = isset($_POST['country']) ? $_POST['country'] : '';
        $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
        $skills = isset($_POST['skills']) ? implode(', ', $_POST['skills']) : '';
        $username = isset($_POST['username']) ? $_POST['username'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $department = isset($_POST['department']) ? $_POST['department'] : '';

   
        // Fields Validation
$errors = [];
$formdata = [];
if(empty($firstName) and isset($firstName)){
    $errors['first-name'] = 'First Name required';
}else{
    $formdata["first-name"] = $firstName;
}

if(empty($lastName) and isset($lastName)){
    $errors['last-name'] = 'Last Name required';
}else{
    $formdata["last-name"] = $lastName;
}


if($_POST["gender"] == Null){
    $errors['gender']='Gender is required';
}else{
    $formdata["gender"] = $gender;
}

if($errors){
    $errors_str = json_encode($errors);
    var_dump($errors_str);
    $url="Location: form.php?errors={$errors_str}";
    if($formdata){
        $old_data = json_encode($formdata);
        $url .="&old={$old_data}";
    }
    header($url);
    exit();
}



// Save the data to a file
$customerData = "{$firstName}:{$lastName}:{$address}:{$country}:{$gender}:{$skills}:{$username}:{$password}:{$department}\n";
$file = fopen("customer.txt", "a");
fwrite($file, $customerData);
fclose($file);

header('Location:userstable.php');


