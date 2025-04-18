<?php
session_start();
require '../includes/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../public/login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $type = $_POST['type'];
    $desc = $_POST['description'];
    $amount = $_POST['amount'];
    $category = $_POST['category'];
    $date = $_POST['date'];

    $stmt = $pdo->prepare("INSERT INTO transactions (user_id, type, description, amount, category, date) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$user_id, $type, $desc, $amount, $category, $date]);

    header('Location: ../public/dashboard.php');
}
