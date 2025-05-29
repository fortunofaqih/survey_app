<?php
session_start();
require_once 'db_config.php';

if (!isset($_SESSION['officer_name']) || !isset($_SESSION['location'])) {
    header('Location: index.php');
    exit;
}

if (isset($_GET['rating']) && in_array($_GET['rating'], ['Sad', 'Happy'])) {
    $officer_name = $_SESSION['officer_name'];
    $location = $_SESSION['location'];
    $rating = $_GET['rating'];

    $query = "INSERT INTO feedback (officer_name, location, rating) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'sss', $officer_name, $location, $rating);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    header('Location: survey.php?message=success');
    exit;
} else {
    header('Location: survey.php');
    exit;
}
?>