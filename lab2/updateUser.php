<?php
if(isset($_POST['submit'])) {

    $user_id = $_POST['id'];

    $file = fopen('customer.txt', 'r');

    $users = [];
    while(!feof($file)) {
        $user = trim(fgets($file));
        $user_data = explode(':', $user);
        if($user_data[0] == $user_id) {
            // Update the user data with the new values
            $user_data[0] = $_POST['first_name'];
            $user_data[1] = $_POST['last_name'];
            $user_data[2] = $_POST['address'];
            $user_data[3] = $_POST['country'];
            $user_data[4] = $_POST['gender'];
            if (!empty($_POST['skills'])) {
                $user_data[5] = implode(', ', $_POST['skills']);
            } else {
                $user_data[5] = ''; 
            }
            $user_data[6] = $_POST['username'];
            $user_data[7] = $_POST['password'];
            $user_data[8] = $_POST['department'];
            $user = implode(':', $user_data);
        }
        $users[] = $user;
    }
    fclose($file);

    $file = fopen('customer.txt', 'w');
    fwrite($file, implode(PHP_EOL, $users));
    fclose($file);

    header('Location: userstable.php');
}