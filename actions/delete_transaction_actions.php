<?php
session_start();
require '../includes/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: public/login.php");
    exit;
}

$id = $_GET['id'] ?? 0;
$userId = $_SESSION['user_id'];

$stmt = $pdo->prepare("DELETE FROM transactions WHERE id = ? AND user_id = ?");
$stmt->execute([$id, $userId]);

header("Location: ../public/dashboard.php");
exit;
