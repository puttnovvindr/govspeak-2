<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "complaint"; // Make sure this matches your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch form data
$name = $_POST['name'] ?? '';
$telephone = $_POST['telephone'] ?? '';
$email = $_POST['email'] ?? '';
$type_of_complaint = $_POST['type_of_complaint'] ?? '';
$date_of_incident = $_POST['date_of_incident'] ?? '';
$location_of_incident = $_POST['location_of_incident'] ?? '';
$complaint = $_POST['complaint'] ?? '';

// Prepare SQL statement
$sql = "INSERT INTO complaint (name, telephone, email, type_of_complaint, date_of_incident, location_of_incident, complaint) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";

// Create prepared statement
$stmt = $conn->prepare($sql);

// Bind parameters
$stmt->bind_param("sssssss", $name, $telephone, $email, $type_of_complaint, $date_of_incident, $location_of_incident, $complaint);

// Execute statement
if ($stmt->execute()) {
    // Data inserted successfully
    echo "New record created successfully";
} else {
    // Error occurred during insertion
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
