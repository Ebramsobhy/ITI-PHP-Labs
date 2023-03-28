<?php
    $firstName = $_POST['first-name'];
    $lastName = $_POST['last-name'];
    $address = $_POST['address'];
    $country = $_POST['country'];
    $gender = $_POST['gender'];
    $skills = implode(', ', $_POST['skills']);
    $username = $_POST['username'];
    $password = $_POST['password'];
    $department = $_POST['department'];

    $title = ($gender === 'male') ? 'Mr.' : 'Miss';
    $message = "Thanks $title $firstName $lastName <br>
    Please review your information below:
    <br><br>Name: $firstName $lastName<br>Address: $address<br>Your Skills: $skills<br>Department: $department";
    echo $message;
?>