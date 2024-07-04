<?php
// Database connection credentials
$servername = "localhost"; // Replace with your server name
$username = "username"; // Replace with your database username
$password = "password"; // Replace with your database password
$dbname = "dbname"; // Replace with your database name

// Create connection
$conn = new mysqli(localhost, root, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Collect form data
    $first_name = htmlspecialchars($_POST['first_name']);
    $last_name = htmlspecialchars($_POST['last_name']);
    $email = htmlspecialchars($_POST['email']);
    $mobile = htmlspecialchars($_POST['mobile']);
    
    // SQL insert statement
    $sql = "INSERT INTO contacts (first_name, last_name, email, mobile)
            VALUES ('$first_name', '$last_name', '$email', '$mobile')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    // Close connection
    $conn->close();
    
} else {
    // If the form was not submitted, redirect back to the form page or handle as needed
    header("Location: index.html");
    exit;
}
?>
