<?php
$conn = new mysqli("localhost", "root", "", "party_rental");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>