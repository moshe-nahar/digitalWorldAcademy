<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "digitalworldacademy";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("INSERT INTO contacts (contact_name, contact_email, contact_phone) 
        VALUES (:contact_name, :contact_email, :contact_phone)");
    $stmt->bindParam(':contact_name', $cntct_name);
    $stmt->bindParam(':contact_email', $cntct_email);
    $stmt->bindParam(':contact_phone', $cntct_phone);
    
    // insert a row
    $cntct_name     = $_POST["cntct_name"];
    $cntct_email    = $_POST["cntct_email"];
    $cntct_phone    = $_POST["cntct_phone"];
    
    $stmt->execute();
    echo "New records created successfully";
}
catch(PDOException $e)
{
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>