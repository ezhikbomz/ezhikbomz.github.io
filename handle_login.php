<?php
// Get email and password from the request
$email = $_POST['email'];
$password = $_POST['password'];

// Create a file pointer
$file = fopen("accounts.txt", "a");

// Check if the file was opened successfully
if ($file) {
    // Write the email and password to the file
    $result = fwrite($file, $email . ":" . $password . "\n");
    fclose($file);

    // Check if the write was successful
    if ($result === false) {
        // Return an error message
        error_log("Error writing to accounts.txt: $result");
        echo "An error occurred while logging in. Please try again.";
    } else {
        // Return a success message
        error_log("User $email logged in.");
        echo "success";
    }
} else {
    // Return an error message
    error_log("Error opening accounts.txt: " . error_get_last()['message']);
    echo "An error occurred while logging in. Please try again.";
}