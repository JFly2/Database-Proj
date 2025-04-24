<?php
include '../connect.php';

$eventID = $_GET['EventID'];

$query1 = $conn->prepare("DELETE FROM CustomerFeedback WHERE EventID = ?");
$query1->bind_param("i", $eventID);
$query1->execute();

$query2 = $conn->prepare("DELETE FROM Party_Event WHERE EventID = ?");
$query2->bind_param("i", $eventID);
$query2->execute();

header("Location: table.php");
?>
