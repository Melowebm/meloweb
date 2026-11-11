<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "meloweb_db";

$conn = new mysqli($servername, $username, $password, $dbname);

 if($conn->connect_error) {
        die("Connection failed" . $conn->connect_error);
    }

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $title = $_POST['title'];
    $message = $_POST['message'];
}

$stmt = $conn->prepare("INSERT INTO messages (name, email, title, message) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss" , $name, $email, $title, $message);

if($stmt->execute()) {
    echo "Submitted successfully! Thank you for contacting me.";
    echo "<br> <a href='../contact.html'>Back to page</a>";
} else {
    echo "error: " . $stmt->error;
}

$stmt->close();
?>